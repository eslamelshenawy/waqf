<?php

namespace App\Observers;

use App\Bank;
use Modules\Accounting\Entities\Account;
use Modules\Accounting\Entities\Fund;
use Modules\Accounting\Entities\Journal;
use Modules\Accounting\Entities\JournalDetail;
use Modules\Accounting\Entities\Voucher;

class VoucherObserver
{

    public function created(Voucher $voucher)
    {

        switch ($voucher->document_type){
            case 'payment':
                $this->paymentTransaction($voucher);
                break;
            case 'receipt':
                $this->receiptTransaction($voucher);
                break;
        }

    }


    public function updated(Voucher $voucher)
    {
        //
    }


    public function deleted(Voucher $voucher)
    {
        //
    }


    public function restored(Voucher $voucher)
    {
        //
    }


    public function forceDeleted(Voucher $voucher)
    {
        //
    }

    private function paymentTransaction(Voucher $voucher): void
    {

        /*
         * Payment Description
         * Fund will be credit
         * and another side will be debit
         *
         * */

        $journal = Journal::create([
            'journalable_type' => 'Modules\Accounting\Entities\Voucher',
            'journalable_id' => $voucher->id,
            'credit' => $voucher->amount,
            'debit' => $voucher->amount,
            'group_id' => 1
        ]);

        $details = collect();

        switch ($voucher->payment_type){
            case 'fund':
                $fund = Fund::find($voucher->paymentable_id);

                // Debit operation in these
                $details->push(JournalDetail::create(
                    [
                        'journal_id' => $journal->id,
                        'account_id' => 1,
                        'debit' => $voucher->amount,
                        'group_id' => 1
                    ]
                ));

                // Credit operation for fund
                $details->push(JournalDetail::create(
                    [
                        'journal_id' => $journal->id,
                        'account_id' => $fund->account->id,
                        'credit' => $voucher->amount,
                        'group_id' => 1
                    ]
                ));


                foreach($details as $detail){
                    $journal->details()->saveMany($details);
                }

                $fund->balances()->create([
                    'debit' => $voucher->amount
                ]);

                $fund->account->balance = $fund->account->balance - $voucher->amount;
                $fund->account->save();
                $fund->save();

                break;

            case 'money_transfer':
                $bank = Bank::find($voucher->paymentable_id);
                $details->push(JournalDetail::create(
                    [
                        'journal_id' => $journal->id,
                        'account_id' => 1,
                        'debit' => $voucher->amount,
                        'group_id' => 1
                    ]
                ));

                $details->push(JournalDetail::create(
                    [
                        'journal_id' => $journal->id,
                        'account_id' => $bank->account->id,
                        'credit' => $voucher->amount,
                        'group_id' => 1
                    ]
                ));

                foreach($details as $detail){
                    $journal->details()->saveMany($details);
                }

                $bank->balances()->create([
                    'debit' => $voucher->amount
                ]);

                $bank->account->balance = $bank->account->balance - $voucher->amount;
                $bank->account->save();
                $bank->save();

                break;
        }

        $account = Account::find($voucher->account_id);
        $account->balance = $account->balance + $voucher->amount;
        $account->save();


    }

    private function receiptTransaction(Voucher $voucher): void
    {
        $journal = Journal::create([
            'journalable_type' => 'Modules\Accounting\Entities\Voucher',
            'journalable_id' => $voucher->id,
            'credit' => $voucher->amount,
            'debit' => $voucher->amount,
            'group_id' => 1
        ]);

        $details = collect();

        $details->push(JournalDetail::create(
            [
                'journal_id' => $journal->id,
                'account_id' => 1,
                'credit' => $voucher->amount,
                'group_id' => 1
            ]
        ));

        $details->push(JournalDetail::create(
            [
                'journal_id' => $journal->id,
                'account_id' => 2,
                'debit' => $voucher->amount,
                'group_id' => 1
            ]
        ));

        foreach($details as $detail){
            $journal->details()->saveMany($details);
        }
        
        $fund = Fund::find($voucher->paymentable_id);

        $fund->balances()->create([
            'credit' => $voucher->amount
        ]);

        $fund->account->balance = $fund->account->balance + $voucher->amount;
        $fund->account->save();
        $fund->save();

        $account = Account::find($voucher->account_id);
        $account->balance = $account->balance + $voucher->amount;
        $account->save();
    }
}
