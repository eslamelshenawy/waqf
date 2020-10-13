@extends('accounting::layouts.master')

@section('content')
@inject('Voucher', '\Modules\Accounting\Entities\Voucher')
@php
$count = $Voucher->where('document_type','Receipt')->count();
@endphp

    <section class="tenants">
        <div class="container" id="tenantContainer">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title"><br><h4>إنشاء سند قبض</h4><br></div>
                            <hr>

                            <form class="needs-validation" novalidate method="POST"
                                  action="{{ route('Accounting::vouchers.receipts.store') }}" autocomplete="off"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12" id="voucher">
                                        <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">
                                            <select class="form-control @error('voucher_type') border border-danger @enderror"
                                                    id="voucher_type" name="voucher_type">
                                                <option selected disabled> أختر نوع سند القبض</option>
<option value="سند داخلى" {{old('voucher_type') == "سند داخلى" ? "selected" : ""}}>سند قبض داخلى</option>
<option value="سند خارجى" {{old('voucher_type') == "سند خارجى" ? "selected" : ""}}>سند قبض خارجى</option>

                                            </select>
                                        </div>
                                        @error('voucher_type')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div style="display:  {{old('voucher_type') == "سند داخلى" ? 'block' : 'none'}}" id="voucher_in">

                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="">رقم السند</label>
                                            <input type="text" name="number_voucher_in" value="{{++$count}}"
                                                   readonly
                                                   class="form-control @error('number_voucher') border border-danger @enderror"/>
                                            @error('number_voucher')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 form-group mb-3 pl-0">
                                            <div class="form-group mb-3">
                                                <label for="order-datepicker">التاريخ</label>
                                                <input id="order-datepicker"
                                                       class="form-control text-right @error('date_voucher_in') border border-danger @enderror"
                                                       placeholder="yyyy-mm-dd" name="date_voucher_in" value="{{old('date_voucher_in')}}">
                                             @error('date_voucher_in')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="user_id">
                                            اسم المودع
                                        </label>
                                        <select class="Name_user form-control select2 @error('user_id_in') border border-danger @enderror" style=" width: 50%;"
                                                name="user_id_in">
 @if(old("user_id_in"))
                                            @foreach(\App\Beneficiary::all() as $beneficiary)
                                                <option value="{{ $beneficiary->id }}"
                                                         {{old("user_id_in")  ==  $beneficiary->id  ? "selected" : ""}}>{{ $beneficiary->name }}
                                                </option>
                                            @endforeach
                                            @endif
                                        </select>
                                         @error('user_id_in')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="user_id">
                                            الحساب الخاص بالمستلم
                                        </label>
                                        <select class=" form-control select2 @error('account_idAttributable_in') border border-danger @enderror" style=" width: 50%;"
                                                name="account_idAttributable_in">
                                            @foreach(\Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code') as  $account)
                                                <option value="{{$account->id}}" {{old('account_idAttributable_in') == $account->id ? 'selected' : '' }}>{{$account->name}} && {{$account->code}}</option>
                                            @endforeach

                                        </select>
                                        @error('account_idAttributable_in')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                    </div>

                                    <div class="col-md-6" id="paymentModeDiv">
                                        <label class="d-block text-12 text-muted">{{ __('accounting::_.receipt_type') }}</label>
                                        <div class="pr-0 mb-4">
                                            <label class="radio radio-reverse radio-danger">
                                                <input type="radio" class="form-control @error('payment_mode_in') border border-danger @enderror" name="payment_mode_in"
                                                       value="Fund" id="paymentModeFund"
                                                       onchange="determinePaymentMode(this.value)" {{old('payment_mode_in') == "Fund" ? "checked" : "" }}>
                                                <span>{{ __('accounting::_.fund') }}</span>
                                                <span class="checkmark"></span>
                                                 @error('payment_mode_in')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </label>
                                            <label class="radio radio-reverse radio-warning">
                                                <input type="radio"
                                                       class="form-control @error('payment_mode_in') border border-danger @enderror"
                                                       name="payment_mode_in" value="Bank" id="paymentModeBank"
                                                       onchange="determinePaymentMode(this.value)" {{old('payment_mode_in') == "Bank" ? "checked" : "" }}>
                                                <span>{{ __('accounting::_.bank') }}</span>
                                                <span class="checkmark"></span>
                                                 @error('payment_mode_in')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </label>
                                        </div>
                                        @error('payment_mode')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <hr>
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <div style="display:{{old('payment_mode_in') == 'Fund' ? 'block' : 'none'}}" id="fundDiv">
                                                <h5 class="font-weight-bold">{{ __('accounting::_.fund') }}</h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <select class="form-control @error('fund_id_in') border border-danger @enderror"
                                                            name="fund_id_in" id="fund_id">
                                                        <option disabled
                                                                selected>{{ __('accounting::_.fund_', ['something' => __('shared::actions.select')]) }}</option>
                                                        @foreach(\Modules\Accounting\Entities\Account::whereIn('id',[21,22])->get() as $fund)
                                                            <option value="{{ $fund->id }}" {{old('fund_id_in') == $fund->id ? 'selected' : '' }}
                                                                    balance="{{$fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit))}}">{{ $fund->name }} &&
                                                                الرصيد {{$fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit))}}  </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                 @error('fund_id_in')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div id="bankDiv" style="display: {{old('payment_mode_in') == 'Bank' ? 'block' : 'none'}}">
                                                <h5 class="font-weight-bold">
                                                    {{ __('accounting::_.bank') }}</h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <select class="form-control @error('bank_id_in') border border-danger @enderror"
                                                            name="bank_id_in" id="bank_id_in">
                                                        <option disabled selected>
                                                            {{ __('accounting::_.bank_', ['something' => __('shared::actions.select')]) }}
                                                        </option>
                                                        @foreach(\Modules\Accounting\Entities\Account::whereIn('id',[25,26])->get() as $bank)
                                                            <option value="{{ $bank->id }}" {{old('fund_id_in') == $bank->id ? 'selected' : '' }}
                                                                    balance_in_bank="{{$bank->debit - ($bank->credit >0 ? $bank->credit : (-1* $bank->credit))}}">{{ $bank->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                               @error('bank_id_in')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-2" id="checke_num" style="display:{{old('payment_mode_in') == 'Bank' ? 'block' : 'none'}}">
                                        <label for="checke_num">رقم الشيك/ الحواله </label>
                                        <input type="text" name="checke_num_in"  maxlength="25" value="{{old('checke_num_in')}}"class="form-control @error('checke_num_in')border border-danger @enderror" id="checke_num"/>
                                         @error('checke_num_in')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 form-group mb-3 pl-0" style="display: {{old('payment_mode_in') == 'Bank' ? 'block' : 'none'}}" id="date_Due">
                                        <div class="form-group mb-3">
                                            <label for="order-datepicker2">تاريخ استحقاق الشيك</label>
                                            <input id="order-datepicker2"
                                                   class="form-control text-right  @error('date_Due_in') border border-danger @enderror"
                                                   placeholder="yyyy-mm-dd" name="date_Due_in" value="{{old('date_Due_in')}}">
                                            @error('date_Due_in')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="amounts" style="display:{{old('payment_mode_in') == 'Fund' || old('payment_mode_in') == 'Bank' ? 'block' :  'none'}}">

                                        <div class="invoice-summary invoice-summary-input float-right">

                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>الرصيد</td>
                                                    <td colspan="2">
                                                        <input type="text" id="amount" name="amount_in"
                                                               class="form-control small-input mb-1 @error('amount') border border-danger @enderror"
                                                               value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td> المبلغ المستلم</td>
                                                    <td><input type="text" id="paid_amount_in" name="paid_amount_in"
                                                               class="form-control small-input mb-1 @error('paid_amount_in') border border-danger @enderror"
                                                               value="0"
                                                               onblur="if(this.value !== 0 || this.value !== null ){discountPaidAmount(this.value)}">
                                                                @error('paid_amount_in')
                            <div>
                                <span class="badge badge-danger">{{ $message }}</span>
                            </div>
                            @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('accounting::_.after_amount') }}</td>
                                                    <td><input type="text"
                                                               id="remaining_amount" name="remaining_amount_in"
                                                               class="form-control small-input mb-1 @error('remaining_amount') border border-danger @enderror"
                                                               value="0" readonly></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-2">
                                        <label for="user_give">مسئول القبض </label>
                                        <input type="text" name="user_give" class="form-control"
                                               value="{{Auth::user()->name}}" id="user_give" disabled/>
                                        @error('user_give')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-2">
                                            <label for="amount">بيان القبض</label>
                                            <textarea type="text" name="description_in" class="form-control  @error('description_in') border border-danger @enderror"
                                                      id="description">{{old('description_in')}}</textarea>
                                             @error('description_in')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div style="display: {{old('voucher_type') == "سند خارجى" ? 'block' : 'none'}}" id="voucher_out">

                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="">رقم السند</label>
                                            <input type="text" name="number_voucher_out" value="{{++$count}}"
                                                   readonly
                                                   class="form-control @error('number_voucher_out') border border-danger @enderror"/>
                                            @error('number_voucher_out')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 form-group mb-3 pl-0">
                                            <div class="form-group mb-3">
                                                <label for="order-datepicker1">التاريخ</label>
                                                <input id="order-datepicker1"
                                                       class="form-control text-right @error('date_voucher_out') @enderror"
                                                       placeholder="yyyy-mm-dd" name="date_voucher_out">
                                                @error('date_voucher_out')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="user_id">
                                            اسم المودع
                                        </label>
                                        <select class="Name_tenant_out form-control select2 @error('user_id_out') border border-danger @enderror" style=" width: 50%;"
                                                name="user_id_out">
 @if(old("user_id_out"))
                                                 @foreach(\App\Beneficiary::all() as $beneficiary)
                                                <option value="{{ $beneficiary->id }}"
                                                         {{old("user_id_out")  ==  $beneficiary->id  ? "selected" : ""}}>{{ $beneficiary->name }}
                                                </option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('user_id_out')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                                
                                        <!-- Button trigger modal -->
{{--                                        <button type="button" class="btn btn-primary" data-toggle="modal"--}}
{{--                                                data-target="#exampleModal">--}}
{{--                                            &plus; add--}}
{{--                                        </button>--}}

                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="user_id">
                                            الحساب الخاص بالمستلم
                                        </label>
                                        <select class=" form-control select2 @error('account_idAttributable_out') border border-danger @enderror" style=" width: 50%;"
                                                name="account_idAttributable_out">
                                            @foreach(\Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code') as  $account)
                                                <option value="{{$account->id}}" {{old('account_idAttributable_out') == $account->id ? 'selected' : '' }}>{{$account->name}} && {{$account->code}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-6" id="paymentModeDiv">
                                        <label class="d-block text-12 text-muted">{{ __('accounting::_.receipt_type') }}</label>
                                        <div class="pr-0 mb-4">
                                            <label class="radio radio-reverse radio-danger">
                                                <input type="radio" class="form-control @error('payment_mode_out') border border-danger @enderror" name="payment_mode_out"
                                                       value="Fund" id="paymentModeFund"
                                                       onchange="determinePaymentMode_out(this.value)"  {{old('payment_mode_out') == 'Fund' ? 'checked' : '' }}>
                                                <span>{{ __('accounting::_.fund') }}</span>
                                                <span class="checkmark"></span>
                                                 @error('payment_mode_out')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </label>
                                            <label class="radio radio-reverse radio-warning">
                                                <input type="radio"
                                                       class="form-control @error('payment_mode_out') border border-danger @enderror"
                                                       name="payment_mode_out" value="Bank" id="paymentModeBank"
                                                       onchange="determinePaymentMode_out(this.value)" {{old('payment_mode_out') == 'Bank' ? 'checked' : '' }}>
                                                <span>{{ __('accounting::_.bank') }}</span>
                                                <span class="checkmark"></span>
                                                 @error('payment_mode_out')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </label>
                                        </div>
                                        @error('payment_mode')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <hr>
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <div style="display: {{old('payment_mode_out') == 'Fund' ? 'block' : 'none'}}" id="fundDiv_out">
                                                <h5 class="font-weight-bold">{{ __('accounting::_.fund') }}</h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <select class="form-control @error('fund_id_out') border border-danger @enderror"
                                                            name="fund_id_out" id="fund_id_out">
                                                        <option disabled
                                                                selected>{{ __('accounting::_.fund_', ['something' => __('shared::actions.select')]) }}</option>
                                                        @foreach(\Modules\Accounting\Entities\Account::whereIn('id',[21,22])->get() as $fund)
                                                            <option value="{{ $fund->id }}" {{old('fund_id_out') == $fund->id ? 'selected' : '' }}
                                                                    balance="{{$fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit))}}">{{ $fund->name }} &&
                                                                الرصيد {{$fund->debit - ($fund->credit >0 ? $fund->credit : (-1* $fund->credit)) }}  </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('fund_id_out')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <div id="bankDiv_out" style="display:  {{old('payment_mode_out') == 'Bank' ? 'block' : 'none'}}">
                                                <h5 class="font-weight-bold">
                                                    {{ __('accounting::_.bank') }}</h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <select class="form-control @error('bank_id_out') border border-danger @enderror"
                                                            name="bank_id_out" id="bank_id_out">
                                                        <option disabled selected>
                                                            {{ __('accounting::_.bank_', ['something' => __('shared::actions.select')]) }}
                                                        </option>
                                                        @foreach(\Modules\Accounting\Entities\Account::whereIn('id',[25,26])->get() as $bank)
                                                            <option value="{{ $bank->id }}"
                                                                    balance_bank="{{$bank->debit - ($bank->credit >0 ? $bank->credit : (-1* $bank->credit))}}">{{ $bank->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                               @error('bank_id_out')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-2" id="checke_num_out" style="display: {{old('payment_mode_out') == 'Bank' ? 'block' : 'none'}}">
                                        <label for="checke_num_out">رقم الشيك/ الحواله </label>
                                        <input type="text" name="checke_num_out"  value="{{old('checke_num_out')}}" maxlength="24" class="form-control @error('checke_num_out') border border-danger @enderror" id="checke_num_out"/>
                                       @error('checke_num_out')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4 form-group mb-3 pl-0" style="display: {{old('payment_mode_out') == 'Bank' ? 'block' : 'none'}}" id="date_Due_out">
                                        <div class="form-group mb-3">
                                            <label for="order-datepicker3">تاريخ استحقاق الشيك</label>
                                            <input id="order-datepicker3"
                                                   class="form-control text-right @error('date_Due_out') @enderror"
                                                   placeholder="yyyy-mm-dd" name="date_Due_out">
                                             @error('date_Due_out')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12" id="amounts_out" style="display: {{old('payment_mode_out') == 'Fund' || old('payment_mode_out') == 'Bank' ? 'block' :  'none'}}">

                                        <div class="invoice-summary invoice-summary-input float-right">

                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>الرصيد</td>
                                                    <td colspan="2">
                                                        <input type="text" id="amount_out" name="amount_out"
                                                               class="form-control small-input mb-1 @error('amount_out') border border-danger @enderror"
                                                               value="0" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>المبلغ المستلم  </td>
                                                    <td><input type="text" id="paid_amount_out" name="paid_amount_out"
                                                               class="form-control small-input mb-1 @error('paid_amount_out') border border-danger @enderror"
                                                               value="0"
                                                               onblur="if(this.value !== 0 || this.value !== null ){discountPaidAmount(this.value)}">
                                                                 @error('paid_amount_out')
                            <div>
                                <span class="badge badge-danger">{{ $message }}</span>
                            </div>
                            @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('accounting::_.after_amount') }}</td>
                                                    <td><input type="text"
                                                               id="remaining_amount_out" name="remaining_amount_out"
                                                               class="form-control small-input mb-1 @error('remaining_amount_out') border border-danger @enderror"
                                                               value="0" readonly></td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>


                                    <div class="col-md-6 mb-2">
                                        <label for="user_give">مسئول القبض </label>
                                        <input type="text" name="user_give" class="form-control"
                                               value="{{Auth::user()->name}}" id="user_give" disabled/>
                                        @error('user_give')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6 mb-2">
                                            <label for="amount">بيان القبض</label>
                                            <textarea type="text" name="description_out" class="form-control @error('description_out') border border-danger @enderror"
                                                     id="description">{{old('description_out')}}</textarea>
                                            @error('description_out')
                                            <div>
                                                <span class="badge badge-danger">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <button type="submit" id="once_submit" class="btn btn-raised btn-raised-primary btn-rounded m-1 mt-3">
                                    Create
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة مستلم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="">الاسم</label>
                            <input type="text" name="name_voucher" value="" id="name_voucher"
                                   class="form-control @error('name_voucher') border border-danger @enderror"/>
                            @error('name_voucher')
                            <div>
                                <span class="badge badge-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="">الايميل</label>
                            <input type="text" name="email_voucher" value="" id="email_voucher"
                                   class="form-control @error('email_voucher') border border-danger @enderror"/>
                            @error('email_voucher')
                            <div>
                                <span class="badge badge-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label for="">رقم الجوال</label>
                            <input type="number" name="mobile_voucher" value="" id="mobile_voucher"
                                   class="form-control @error('mobile_voucher') border border-danger @enderror"/>
                            @error('mobile_voucher')
                            <div>
                                <span class="badge badge-danger">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="">نوع المستلم </label>
                            <select type="text" name="voucher_user_type" id="voucher_user_type">
                                <option value="">اخنر نوع الموبيل </option>
                                <option value="مورد"> مورد</option>
                                <option value="خدمات"> خدمات </option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit_data">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripting...')

    <script>

        $(document).ready(function () {
            
                 document.getElementById("paid_amount_in").value ="";
            document.getElementById("paid_amount_out").value ="";
            $('#paid_amount_in').on('change', function () {
                var paid_amount=$(this).val();
                var amount=$('#amount').val();
                // alert(Number(paid_amount) > Number(amount));
                if(Number(paid_amount) > Number(amount) ){
                    document.getElementById("paid_amount_in").value =" ";
                    document.getElementById('danger_number_in').style.display = 'block';
                }else{
                    if(Number(paid_amount) == 0){
                                            document.getElementById("paid_amount_in").value =" ";
                    }
                    document.getElementById('danger_number_in').style.display = 'none';
                }
            }); 
            
              
            // $('#paid_amount_out').on('change', function () {
            //     var paid_amount=$(this).val();
            //     var amount=$('#amount').val();
            //     // alert(Number(paid_amount) > Number(amount));
            //     if(Number(paid_amount) > Number(amount) ){
            //         document.getElementById("paid_amount_out").value =" ";
            //         document.getElementById('danger_number_out').style.display = 'block';
            //     }else{
            //          if(Number(paid_amount) == 0){
            //           document.getElementById("paid_amount_out").value =" ";
            //         }
            //         document.getElementById('danger_number_out').style.display = 'none';
            //     }
            // });
            
            $('#fund_id').on('change', function () {
                var option = $('option:selected', this).attr('balance');
                document.getElementById("amount").value = option;
                var total = option;
            });
            $('#bank_id_in').on('change', function () {
                var option = $('option:selected', this).attr('balance_in_bank');
                document.getElementById("amount").value = option;
                var total = option;
            });
            $('#fund_id_out').on('change', function () {
                var option = $('option:selected', this).attr('balance');
                document.getElementById("amount_out").value = option;
                var total = option;
            });
            $('#bank_id_out').on('change', function () {
                var option = $('option:selected', this).attr('balance_bank');
                document.getElementById("amount_out").value = option;
                var total = option;
            });
            $('#voucher_type').on('change', function () {
                if (this.value == "سند داخلى") {
                    document.getElementById('voucher_in').style.display = 'block';
                    document.getElementById('voucher_out').style.display = 'none';
                } else {
                    document.getElementById('voucher_out').style.display = 'block';
                    document.getElementById('voucher_in').style.display = 'none';
                }
            });
        });


        var determinePaymentMode = function (val) {
            if (val === 'Fund') {
                document.getElementById('fundDiv').style.display = 'block';
                document.getElementById('amounts').style.display = 'block';
                document.getElementById('bankDiv').style.display = 'none';
                document.getElementById('checke_num').style.display = 'none';
                document.getElementById('date_Due').style.display = 'none';

            } else if (val === 'Bank') {
                document.getElementById('bankDiv').style.display = 'block';
                document.getElementById('checke_num').style.display = 'block';
                document.getElementById('date_Due').style.display = 'block';
                document.getElementById('fundDiv').style.display = 'none';
                document.getElementById('amounts').style.display = 'block';
            } else {
                document.getElementById('fundDiv').style.display = 'none';
                document.getElementById('fundDiv').value = null;
                document.getElementById('fundDiv').setAttribute('value', null);
                document.getElementById('bankDiv').style.display = 'none';
                document.getElementById('fundDiv').style.display = 'none';
            }
        };
        var determinePaymentMode_out = function (val) {
            if (val === 'Fund') {
                document.getElementById('fundDiv_out').style.display = 'block';
                document.getElementById('amounts_out').style.display = 'block';
                document.getElementById('bankDiv_out').style.display = 'none';
                document.getElementById('checke_num_out').style.display = 'none';
                document.getElementById('date_Due_out').style.display = 'none';

            } else if (val === 'Bank') {
                document.getElementById('bankDiv_out').style.display = 'block';
                document.getElementById('checke_num_out').style.display = 'block';
                document.getElementById('date_Due_out').style.display = 'block';
                document.getElementById('fundDiv_out').style.display = 'none';
                document.getElementById('amounts_out').style.display = 'block';
            } else {
                document.getElementById('fundDiv_out').style.display = 'none';
                document.getElementById('fundDiv_out').value = null;
                document.getElementById('fundDiv_out').setAttribute('value', null);
                document.getElementById('bankDiv_out').style.display = 'none';
                document.getElementById('fundDiv_out').style.display = 'none';
            }
        };


        var discountPaidAmount = function (val) {
            let currentTotal = document.getElementById("amount").value;
            let currentTotal_out = document.getElementById("amount_out").value;
            currentTotal =  Number(currentTotal) + Number(parseFloat(val)) ;
            currentTotal_out = Number(currentTotal_out) + Number(parseFloat(val));


            document.getElementById('amount_out').value;
            document.getElementById('remaining_amount').value = currentTotal;
            document.getElementById('remaining_amount_out').value = currentTotal_out;
        };

        $(document).ready(function () {
            $("#order-datepicker1").pickadate();
            $("#order-datepicker2").pickadate();
            $("#order-datepicker3").pickadate();
        });
    </script>

@endsection
