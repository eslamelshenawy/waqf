<?php


namespace Modules\Accounting\Repositories\Invoice;

use App\TenantBalance;
use Illuminate\Support\Facades\DB;
use Modules\Accounting\Entities\Account;
use Modules\Accounting\Entities\Bank;
use Modules\Accounting\Entities\BankBalance;
use Modules\Accounting\Entities\Fund;
use Modules\Accounting\Entities\FundBalance;
use Modules\Accounting\Entities\Invoice;
use Modules\Accounting\Entities\InvoiceDetail;
use Modules\Accounting\Entities\Journal;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function all()
    {
        return Invoice::all();
    }

    public function getById(int $id)
    {
        return 0;
    }

    public function create(array $data)
    {
//        dd($data );
        // Create invoice header
        $invoiceCount=Invoice::get()->count();
        $JournalCount=Journal::get()->count();
        $invoice = null;
        $Journal=new Journal;
        $Journal->number   =++$JournalCount;
        $Journal->details   = $data['description_invoice'];
        $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
        $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
        $Journal->journalable_id   =32;
        $Journal->debit   =$data['service_price'];
        $Journal->group_id   =1;
        $Journal->save();

        $Account=Account::find(32);
        $balabcelasteDebit=$Account->debit + $data['service_price'] > 0 ? $Account->debit + $data['service_price'] : (-1*($Account->debit + $data['service_price']));
        $Account->update([
            'debit' => $balabcelasteDebit,
        ]);

        $Journal=new Journal;
        $Journal->number   =++$JournalCount;
        $Journal->details   = $data['description_invoice'];
        $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
        $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
        $Journal->journalable_id   =$data['account_id'];
        $Journal->credit   =$data['service_price'];
        $Journal->group_id   =1;
        $Journal->save();

        $Account=Account::find($data['account_id']);
        $balabcelasteCredit=$Account->credit + $data['service_price'] > 0 ? $Account->credit + $data['service_price'] : (-1*($Account->credit + $data['service_price']));
        $Account->update([
            'credit' => $balabcelasteCredit,
        ]);

        DB::transaction(function() use ($data,$invoice,$Journal ,$invoiceCount){
            $invoice = Invoice::create([
                'tenant_id' => $data['tenant_id'],
                'account_id' => $data['account_id'],
                'paymentable_id' => 32,
                'order_number' => ++$invoiceCount,
                'invoice_code' => isset($data['invoice_code']) ? $data['invoice_code'] : null,
                'order_at' => $data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null,
                'notes' => isset($data['notes']) ? $data['notes'] : null,
                'amount' => $data['service_price'],
                'group_id' => 1
            ]);

            $TenantBalance = TenantBalance::where('tenant_id',$data['tenant_id'])->first();
            if(!$TenantBalance){

                TenantBalance::create([
                    'tenant_id' => $data['tenant_id'],
                    'debit' => $data['service_price'],
                    'description' => $data['description_invoice'],
                    'invoiceNum' => $invoice->order_number,
                ]);
            }else{

                $TenantBalance->update([
                    'debit' => $TenantBalance->debit + $data['service_price'],
                    'description' => $data['description_invoice'],
                    'invoiceNum' => $invoice->order_number,

                ]);

            }

            /* Create invoice body details line items */

            $invoice->details()->create([
                'invoice_id' => $invoice->id,
                'service_name' => $data['service_name'],
                'service_price' => $data['service_price'],
                'description' => $data['description_invoice'],
                'group_id' => 1
            ]);
        });

        return $invoice;

//        $invoiceDetails = collect();
//
//        foreach($data['invoice_details'] as $key => $item){
//            $invoiceDetails->push([
//                'invoice_id' => $invoice->id,
//                'service_name' => $item[$key]['service_name'],
//                'service_amount' => $item[$key]['service_amount'],
//                'description' => $item[$key]['description'],
//                'group_id' => 1
//            ]);
//        }
//
//        $invoice->details()->saveMany($invoiceDetails);

    }

    public function update(array $data,$id)
    {

        $invoice = Invoice::find($id);
        $JournalCount=Journal::get()->count();
        // dd($invoice);
        $Journal= Journal::where('number',$invoice->order_number)->get();
        $invoiceCount=Invoice::get()->count();
        foreach ($Journal as $key=> $Jour){
            $Jour->delete();
        }
        $Journal=new Journal;
        $Journal->number   =++$JournalCount;
        $Journal->details   = $data['description_invoice'];
        $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
        $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
        $Journal->journalable_id   =32;
        $Journal->debit   =$data['service_price'];
        $Journal->group_id   =1;
        $Journal->save();

        $Account=Account::find(32);
        $balabcelasteDebit=$Account->debit + $data['service_price'] > 0 ? $Account->debit + $data['service_price'] : (-1*($Account->debit + $data['service_price']));
        $Account->update([
//            'debit' => $balabcelasteDebit,
        ]);

        $Journal=new Journal;
        $Journal->number   =++$JournalCount;
        $Journal->details   = $data['description_invoice'];
        $Journal->date_at   =$data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null;
        $Journal->journalable_type   ='Modules\Accounting\Entities\Journal';
        $Journal->journalable_id   =$data['account_id'];
        $Journal->credit   =$data['service_price'];
        $Journal->group_id   =1;
        $Journal->save();

        $Account=Account::find($data['account_id']);
        $Account->update([
//            'credit' => $Account->credit + $data['service_price'],
        ]);

            // dd($Journal);
        $TenantBalance = TenantBalance::where('tenant_id',$data['tenant_id'])->first();

             $invoice->update([
                 'tenant_id' => $data['tenant_id'],
                 'account_id' => $data['account_id'],
                 'paymentable_id' => 32,
                //  'order_number' => ++$invoiceCount,
                 'invoice_code' => isset($data['invoice_code']) ? $data['invoice_code'] : null,
                 'order_at' => $data['order_at'] ? date('Y-m-d', strtotime($data['order_at'])) : null,
                 'notes' => isset($data['notes']) ? $data['notes'] : null,
                 'amount' => $data['service_price'],
                 'group_id' => 1
            ]);

            if(!$TenantBalance){

                TenantBalance::create([
                    'tenant_id' => $data['tenant_id'],
                    'debit' => $data['service_price'],
                    'description' => $data['description_invoice'],
                    'invoiceNum' => $invoice->order_number,
                ]);
            }else{
            $TenantBalance->update([
                'debit' => $TenantBalance->debit + $data['service_price'],
                'description' => $data['description_invoice'],
                'invoiceNum' => $invoice->order_number,
            ]);


            }



//        if(isset($data['fund_id'])){
//            $fund = Fund::find($data['fund_id']);
//            $fundBalance = FundBalance::where('fund_id',$data['fund_id'])->first();
//            $mount=$fund->balance + $data['paid_amount'];
//            $credit=$fundBalance->credit + $data['paid_amount'];
//            $fund->update([
//                'balance' => $mount,
//            ]);
//            $fundBalance->update([
//                'credit' => $credit,
//            ]);
//
//
//        }
//        if(isset($data['bank_id'])){
//            $Bank = Bank::find($data['bank_id']);
//            $BankBalance = BankBalance::where('bank_id',$data['bank_id'])->first();
//            $mount=$Bank->balance + $data['paid_amount'];
//            $credit=$BankBalance->credit + $data['paid_amount'];
//            $Bank->update([
//                'balance' => $mount,
//            ]);
//            $BankBalance->update([
//                'credit' => $credit,
//            ]);
//
//        }

            /* Create invoice body details line items */
        $invoice = Invoice::find($id);
        $invoice->details()->first()->update([
                'invoice_id' => $invoice->id,
                'service_name' => $data['service_name'],
                'service_price' => $data['service_price'],
                'description' => isset($data['description_invoice']) ? $data['description_invoice'] : "",
                'group_id' => 1
            ]);

        return $invoice;

    }


}
