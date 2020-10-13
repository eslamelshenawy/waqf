@extends('accounting::layouts.master')

@section('content')

    <!-- ============ Body content start ============= -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{--                <ul class="nav nav-tabs justify-content-end mb-4" id="myTab" role="tablist">--}}
                {{--                    <li class="nav-item">--}}
                {{--                        <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="true">Invoice</a>--}}
                {{--                    </li>--}}

                {{--                    --}}
                {{--                    <li class="nav-item">--}}
                {{--                        <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit</a>--}}
                {{--                    </li>--}}

                {{--                </ul>--}}
                <div class="card">

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                            <!--==== Edit Area =====-->
                            <div class="d-flex mb-5">
                                <span class="m-auto"></span>

                                <button class="btn btn-raised btn-raised-primary btn-rounded-3 m-1" type="button" id="invoiceFormSaveBtn" onclick="tryToSaveInvoice()">
                                    <i class="fas fa-save"></i> &nbsp;&nbsp;{{ __('shared::actions.save') }}
                                </button>
                            </div>
                            <form method="POST" action="{{ route('Accounting::invoices.update', $invoice->id) }}" id="invoiceForm" name="invoice_form">
                                @csrf

                                <div class="row justify-content-between">
                                    <div class="col-md-10">

                                        <h4 class="font-weight-bold">{{ __('accounting::_.invoice_', ['something' => __('accounting::_.info')]) }}</h4>

                                        <div class="col-md-4 mb-4">
                                            @inject('account', '\Modules\Accounting\Entities\Account')
                                            <label for="type">{{ __('accounting::_.typefund') }}</label>
                                            <select class="form-control" name="account_id" id="account_id" required>
                                                <option selected disabled>{{ __('shared::actions.select') }}</option>
                                                @foreach($account->where('parent_id', '!=' ,null )->get() as $c)
                                                    <option value="{{ $c->parent_id }}" {{$invoice->account_id == $c->parent_id ? 'selected' : '' }} >{{ $c->name  }}
                                                        && {{$c->type}}</option>
                                                @endforeach
                                            </select>
                                            @error('account_id')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4 form-group mb-3 pl-0">
                                            <label for="invoiceNumber">{{ __('accounting::_.invoice_', ['something' => 'رقم']) }}</label>
                                            <input type="text" name="order_number"  value="{{$invoice->order_number}}" class="form-control @error('order_number') border border-danger @enderror" id="invoiceNumber"
                                                   placeholder="{{ __('accounting::_.invoice_', ['something' => 'رقم']) }}">
                                            @error('order_number')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 form-group mb-3 pl-0">
                                            <label for="invoiceCode">{{ __('accounting::_.invoice_', ['something' => 'كود']) }}</label>
                                            <input type="text" name="invoice_code"  value="{{$invoice->invoice_code}}" class="form-control @error('invoice_code') border border-danger @enderror" id="invoiceCode"
                                                   placeholder="{{ __('accounting::_.invoice_', ['something' => 'كود']) }}">
                                            @error('invoice_code')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4 form-group mb-3 pl-0">
                                            <div class="form-group mb-3">
                                                <label for="order-datepicker">{{ __('accounting::_.invoice_', ['something' => 'تاريخ']) }}</label>
                                                <input id="order-datepicker"value="{{$invoice->order_at}}"  class="form-control text-right @error('order_at') @enderror" placeholder="yyyy-mm-dd" name="order_at">
                                                @error('order_at')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 form-group mb-3 pl-0">
                                            <label for="notes">{{ __('accounting::_.notes') }}</label>
                                            <textarea class="form-control @error('notes') border border-danger @enderror" name="notes" id="notes"
                                                      placeholder="{{ __('accounting::_.notes') }}" rows="4" >{{$invoice->notes}}</textarea>
                                            @error('notes')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="d-block text-12 text-muted">{{ __('accounting::_.document_type') }}</label>
                                        <div class="pr-0 mb-4">
                                            <label class="radio radio-reverse radio-danger">
                                                <input type="radio" name="document_type" class="form-control" value="cash" {{$invoice->document_type == 'cash' ? 'checked' : '' }} id="documentTypeCash" onchange="determineDocumentType(this.value)">
                                                <span>{{ __('accounting::_.cash') }}</span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio radio-reverse radio-warning">
                                                <input type="radio" class="form-control @error('document_type') @enderror" name="document_type" {{$invoice->document_type == 'credit' ? 'checked' : '' }}  value="credit" id="documentTypeCredit" onchange="determineDocumentType(this.value)">
                                                <span>{{ __('accounting::_.credit') }}</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        @error('document_type')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6" id="paymentModeDiv" style="display:none;">
                                        <label class="d-block text-12 text-muted">{{ __('accounting::_.payment_mode') }}</label>
                                        <div class="pr-0 mb-4">
                                            <label class="radio radio-reverse radio-danger">
                                                <input type="radio" class="form-control" name="payment_mode" value="fund" {{$invoice->payment_mode == 'fund' ? 'checked' : '' }} id="paymentModeFund" onchange="determinePaymentMode(this.value)">
                                                <span>{{ __('accounting::_.fund') }}</span>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio radio-reverse radio-warning">
                                                <input type="radio" class="form-control @error('payment_mode') @enderror" name="payment_mode" value="bank" {{$invoice->payment_mode == 'fund' ? 'checked' : '' }} id="paymentModeBank" onchange="determinePaymentMode(this.value)">
                                                <span>{{ __('accounting::_.bank') }}</span>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        @error('payment_mode')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mt-3 mb-4 border-top"></div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div style="display: none" id="fundDiv">
                                            <h5 class="font-weight-bold">{{ __('accounting::_.fund') }}</h5>
                                            <div class="col-md-10 form-group mb-3 pl-0">
                                                <select class="form-control @error('fund_id') border border-danger @enderror" name="fund_id">
                                                    <option disabled selected>{{ __('accounting::_.fund_', ['something' => __('shared::actions.select')]) }}</option>
                                                    @foreach(\Modules\Accounting\Entities\Fund::all() as $fund)
                                                        <option value="{{ $fund->id }}" {{$invoice->fund_id == $fund->id ? 'selected' : '' }}>{{ $fund->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('fund_id')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>

                                        <div id="bankDiv" style="display: none;">
                                            <h5 class="font-weight-bold">
                                                {{ __('accounting::_.bank') }}</h5>
                                            <div class="col-md-10 form-group mb-3 pl-0">
                                                <select class="form-control @error('bank_id') border border-danger @enderror" name="bank_id">
                                                    <option disabled selected>
                                                        {{ __('accounting::_.bank_', ['something' => __('shared::actions.select')]) }}
                                                    </option>
                                                    @foreach(\Modules\Accounting\Entities\Bank::all() as $bank)
                                                        <option value="{{ $bank->id }}" {{$invoice->bank_id == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('bank_id')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6" id="tenantDiv" style="display:none;">
                                        <h5 class="font-weight-bold">{{ __('accounting::_.bill_to') }}</h5>
                                        <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">

                                            <select class="form-control @error('tenant_id') border border-danger @enderror" name="tenant_id">
                                                <option selected disabled>{{ __('accounting::_.tenant') }}</option>
                                                @foreach(\App\Tenant::all() as $tenant)
                                                    <option value="{{ $tenant->id }}" {{$invoice->tenant_id == $tenant->id ? 'selected' : '' }}>{{ $tenant->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('tenant_id')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                        <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">
                                            <textarea class="form-control text-right" placeholder="Bill From Address" name="bill_address">{{$invoice->bill_address}} </textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="clearfix"></div>

                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-hover mb-3">
                                            <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ __('accounting::_.service_', ['something' => 'اسم']) }}</th>
                                                <th scope="col">{{ __('accounting::_.service_', ['something' => 'سعر']) }}</th>
                                                <th scope="col">{{ __('accounting::_.service_', ['something' => 'وصف']) }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @inject('invoiceDetail', '\Modules\Accounting\Entities\InvoiceDetail')
                                            @php
                                            $invoiceDetails=$invoiceDetail->where('invoice_id',$invoice->id)->first();
                                            @endphp
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <input name="service_name" type="text" value="{{$invoiceDetails->service_name}}" class="form-control"
                                                           placeholder="{{ __('accounting::_.service_', ['something' => 'اسم']) }}" id="serviceName">
                                                </td>
                                                <td>
                                                    <input name="service_price" type="number" class="form-control" value="{{$invoiceDetails->service_price}}"
                                                           placeholder="{{ __('accounting::_.service_', ['something' => 'سعر']) }}" id="servicePrice" onblur="if(this.value !== 0 || this.value !== null){updateTotal(this.value)}" >
                                                </td>
                                                <td>
                                                    <input name="description" type="text" class="form-control" value="{{$invoiceDetails->description}}"
                                                           placeholder="{{ __('accounting::_.service_', ['something' => 'وصف']) }}" id="serviceDescription">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        {{--                <button class="btn btn-primary float-right mb-4" type="button" id="addItem">Add Item</button>--}}
                                    </div>

                                    <div class="col-md-12">

                                        <div class="invoice-summary invoice-summary-input float-right">

                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>{{ __('accounting::_.amount') }}</td>
                                                    <td colspan="2"><input type="text" id="amount" name="amount" value="{{$invoice->amount}}"
                                                                           class="form-control small-input mb-1 @error('amount') border border-danger @enderror" value="0"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('accounting::_.paid_amount') }}</td>
                                                    <td><input type="text" id="paid_amount" name="paid_amount" value="{{$invoice->paid_amount}}"
                                                               class="form-control small-input mb-1 @error('paid_amount') border border-danger @enderror" value="0"
                                                               onblur="if(this.value !== 0 || this.value !== null ){discountPaidAmount(this.value)}"></td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('accounting::_.remaining_amount') }}</td>
                                                    <td><input type="text"
                                                               id="remaining_amount" name="remaining_amount" value="{{$invoice->remaining_amount}}"
                                                               class="form-control small-input mb-1 @error('remaining_amount') border border-danger @enderror" value="0" readonly></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                </div>
                            </form>
                            <!--==== / Edit Area =====-->
                        </div>

                        @section('scripting...')
                            <script>
                                if ($('#documentTypeCredit').is(':checked')) {
                                    document.getElementById('tenantDiv').style.display = 'block';
                                }
                                if ($('#documentTypeCash').is(':checked')) {
                                    document.getElementById('paymentModeDiv').style.display = 'block';
                                }
                                if ($('#paymentModeFund').is(':checked')) {
                                    document.getElementById('fundDiv').style.display = 'block';
                                }
                                if ($('#paymentModeBank').is(':checked')) {
                                    document.getElementById('bankDiv').style.display = 'block';
                                }

                                let total = 0;

                                var determineDocumentType = function(val){
                                    if(val === 'cash'){
                                        document.getElementById('fundDiv').style.display = 'block';
                                        document.getElementById('paymentModeDiv').style.display = 'block';
                                        document.getElementById('bankDiv').style.display = 'none';
                                        document.getElementById('tenantDiv').style.display = 'block';

                                    }else if(val === 'credit'){
                                        document.getElementById('bankDiv').style.display = 'none';
                                        document.getElementById('bankDiv').value = null;
                                        document.getElementById('bankDiv').setAttribute('value', null);
                                        document.getElementById('fundDiv').style.display = 'none';
                                        document.getElementById('fundDiv').value = null;
                                        document.getElementById('fundDiv').setAttribute('value', null);
                                        document.getElementById('tenantDiv').value = null;
                                        document.getElementById('tenantDiv').style.display = 'block';
                                        document.getElementById('paymentModeDiv').style.display = 'none';
                                    }else{
                                        document.getElementById('bankDiv').style.display = 'none';
                                        document.getElementById('bankDiv').value = null;
                                        document.getElementById('bankDiv').setAttribute('value', null);
                                        document.getElementById('fundDiv').style.display = 'none';
                                        document.getElementById('fundDiv').value = null;
                                        document.getElementById('fundDiv').setAttribute('value', null);
                                        document.getElementById('tenantDiv').style.display = 'block';
                                        document.getElementById('paymentModeDiv').style.display = 'none';
                                        document.getElementById('paymentModeDiv').value = null;
                                        document.getElementById('')
                                    }
                                };

                                var determinePaymentMode = function(val){
                                    if(val === 'fund'){
                                        document.getElementById('fundDiv').style.display = 'block';
                                        document.getElementById('tenantDiv').style.display = 'block';
                                        document.getElementById('bankDiv').style.display = 'none';
                                        document.getElementById('bankDiv').removeAttribute('name');

                                    }else if(val === 'bank'){
                                        document.getElementById('bankDiv').style.display = 'block';
                                        document.getElementById('tenantDiv').style.display = 'block';
                                        document.getElementById('fundDiv').style.display = 'none';
                                    }else{
                                        document.getElementById('fundDiv').style.display = 'none';
                                        document.getElementById('fundDiv').value = null;
                                        document.getElementById('fundDiv').setAttribute('value', null);
                                        document.getElementById('bankDiv').style.display = 'none';
                                        document.getElementById('fundDiv').style.display = 'none';

                                        document.getElementById('tenantDiv').style.display = 'none';
                                    }
                                };





                                var tryToSaveInvoice = function(){
                                    var invoiceForm = document.getElementsByName('invoice_form');

                                    let documentType = document.getElementsByName('document_type');

                                    if(documentType[0].checked === false && documentType[1].checked === false){
                                        return false;
                                    }

                                    let serviceName = document.getElementById('serviceName');
                                    let servicePrice = document.getElementById('servicePrice');
                                    let serviceDescription = document.getElementById('serviceDescription');




                                    invoiceForm[0].submit();
                                };



                                var updateTotal = function(val){
                                    total = parseFloat(val);
                                    document.getElementById('amount').value = total;
                                };

                                var discountPaidAmount = function(val){
                                    let currentTotal = total;
                                    currentTotal = currentTotal - parseFloat(val);


                                    document.getElementById('amount').value = total;
                                    document.getElementById('remaining_amount').value = currentTotal;
                                };




                            </script>
                        @endsection


                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- ============ Body content End ============= -->



@endsection


@section('scripting...')
    <script>

    </script>
@endsection
