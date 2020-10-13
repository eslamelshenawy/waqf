<?php

namespace App\Observers;

use App\Tenant;
use Illuminate\Support\Facades\DB;
use Modules\Accounting\Entities\Account;
use Modules\Accounting\Entities\Fund;
use Modules\Accounting\Entities\Invoice;
use Modules\Accounting\Entities\Journal;
use Modules\Accounting\Entities\JournalDetail;
use Modules\Accounting\Entities\Transaction;
use Modules\Accounting\Repositories\Voucher\VoucherRepositoryInterface;

class InvoiceObserver
{
    protected $voucher;
    public function __construct(VoucherRepositoryInterface $voucher)
    {
        $this->voucher = $voucher;
    }

    public function created(Invoice $invoice)
    {
        switch ($invoice->document_type){
            case 'cash':
                // make receipt voucher
                // make transaction
                // update fund or bank
                // update account

                if($invoice->document_type == 'cash' && $invoice->paymentable_type == 'Modules\\Accounting\\Entities\\Fund'){

                    if( $invoice->paid_amount == $invoice->amount && $invoice->remaining_amount == 0 ){
                        $this->voucher->create([
                            'voucherable_type' => 'Invoice',
                            'voucherable_id' => $invoice->id,
                            'paymentable_type' => 'Fund',
                            'paymentable_id' => $invoice->paymentable_id,
                            'account_id' => $invoice->account_id,
                            'accountable_type' => 'App\\Tenant',
                            'accountable_id' => $invoice->tenant_id,
                            'attributable_type' => 'App\\Tenant',
                            'attributable_id' => $invoice->tenant_id,
                            'document_type' => 'receipt',
                            'amount' => $invoice->paid_amount,
                            'group_id' => 1
                        ]);
                    }elseif($invoice->remaining_amount > 0){
                        goto makeJournal;
                    }


                }elseif($invoice->document_type == 'cash' && $invoice->paymentable_type == 'Modules\\Accounting\\Entities\\Bank'){

                    if( $invoice->paid_amount == $invoice->amount && $invoice->remaining_amount == 0 ){
                        $this->voucher->create([
                            'voucherable_type' => 'Invoice',
                            'voucherable_id' => $invoice->id,
                            'document_type' => 'cash',
                            'paymentable_type' => 'Bank',
                            'paymentable_id' => $invoice->paymentable_id,
                            'account_id' => $invoice->account_id,
                            'attributable_type' => 'Invoice',
                            'attributable_id' => $invoice->id,
                            'amount' => $invoice->paid_amount,
                            'group_id' => 1
                        ]);
                    }

                }

                break;
                ##########################
            case 'credit':
                makeJournal:
                $journal = Journal::create([
                    'journalable_type' => 'Modules\\Accounting\\Entites\\Invoice',
                    'journalable_id' => $invoice->id,
                    'debit' => $invoice->remaining_amount,
                    'credit' => $invoice->remaining_amount,
                    'group_id' => 1
                ]);

                $journalDetails = collect();

                $tenant = Tenant::find($invoice->tenant_id);

                $journalDetails->push(JournalDetail::create([
                    'journal_id' => $journal->id,
                    'account_id' => $tenant->account->id,
                    'debit' => $invoice->remaining_amount,
                    'group_id' => 1
                ]));

                $journalDetails->push(JournalDetail::create([
                    'journal_id' => $journal->id,
                    'account_id' => 1,
                    'credit' => $invoice->remaining_amount,
                    'group_id' => 1
                ]));


                $journal->details()->saveMany($journalDetails);

                /* Update sales account */
                $salesAccount = Account::find($invoice->account_id);
                $salesAccount->balance = $salesAccount->balance + $invoice->remaining_amount;

                /* Update receivables account */
                $tenantAccount = Account::find($invoice->tenant->account_id);
                $tenantAccount->balance = $tenantAccount->balance + $invoice->remaining_amount;

                $tenant = Tenant::find($invoice->tenant_id);

                $tenant->balances()->create([
                    'debit' => $invoice->remaining_amount,
                    'description' => 'Sales invoice #' . $invoice->id
                ]);
                // make journal
                // make transaction
                // update fund or bank
                // update account
                break;
                ##########################
        }
    }

    public function updated(Invoice $invoice)
    {
        //
    }


    public function deleted(Invoice $invoice)
    {
        //
    }


    public function restored(Invoice $invoice)
    {
        //
    }


    public function forceDeleted(Invoice $invoice)
    {
        //
    }

    private function creditTransaction()
    {

    }

    private function fundTransaction($invoice)
    {
        $this->voucher->create([
            'voucherable_type' => 'Modules\Accounting\Entities\Invoice',
            'voucherable_id' => $invoice->id,
            'invoice_type' => 'receipt',
            'payment_mode' => 'fund',
            'paymentable_type' => 'Modules\Accounting\Entities\Fund',
            'paymentable_id' => $invoice->fund_id,
            'attributable_type' => 'Modules\Accounting\Entities\Tenant',
            'attributable_id' => $invoice->tenant_id,
            'amount' => $invoice->paid_amount
        ]);

        $tenant = Tenant::find($invoice->tenant_id);

        $tenant->balances()->create([
            'credit' => $invoice->paid_amount
        ]);

        if($invoice->remaining_amount > 0){
            $tenant->balances()->create([
                'debit' => $invoice->remaining_amount
            ]);
        }

    }

    private function moneyTransferTransaction($invoice)
    {
        $this->voucher->create([
            'voucherable_type' => 'Modules\Accounting\Entities\Invoice',
            'voucherable_id' => $invoice->id,
            'invoice_type' => 'receipt',
            'payment_mode' => 'money_transfer',
            'paymentable_type' => 'Modules\Accounting\Entities\Bank',
            'paymentable_id' => $invoice->bank_id,
            'attributable_type' => 'Modules\Accounting\Entities\Tenant',
            'attributable_id' => $invoice->tenant_id,
            'amount' => $invoice->paid_amount
        ]);

        $tenant = Tenant::find($invoice->tenant_id);

        $tenant->balances()->create([
            'credit' => $invoice->paid_amount
        ]);

        if($invoice->remaining_amount > 0){
            $tenant->balances()->create([
                'debit' => $invoice->remaining_amount
            ]);
        }
    }

    private function chequeTransaction($invoice)
    {

    }


}
