@extends('accounting::layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">

                        <div class="card-title">
                            <br>
                            <h4>{{ __('shared::actions.manage') . ' ' . __($account->name) }}</h4>

                            <br></div>
                        <hr>
                        <div class="form-row">

                            <div class="col-md-4 mb-4">
                                <label data-error="wrong" data-success="right" for="form3">
                                    {{ __('accounting::_.account_', ['something' => 'كود']) }}
                                </label>
                                <input type="text" id="codeAccount" class="form-control validate"
                                       value="{{ $account->code }}">
                            </div>

                            <div class="col-md-4 mb-4">
                                <label data-error="wrong" data-success="right" for="form2" class="text-right">
                                    {{ __('accounting::_.account_', ['something' => 'اسم']) }}
                                </label>
                                <input type="text" id="nameAccount" class="form-control validate"
                                       value="{{$account->name}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <label data-error="wrong" data-success="right" for="form2" class="text-right">
                                    {{ __('accounting::_.account_', ['something' => 'مدين ']) }}
                                </label>
                                <input type="number" id="debitAccount" value="0" class="form-control validate"
                                       value="{{$account->debit}}">
                            </div>
                            <div class="col-sm-6">
                                <label data-error="wrong" data-success="right" for="form2" class="text-right">
                                    {{ __('accounting::_.account_', ['something' => 'دائن ']) }}
                                </label>
                                <input type="number" id="creditAccount" value="0" class="form-control validate"
                                       value="{{$account->credit}}">
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="col-sm-6">
                                <label data-error="wrong" data-success="right" for="form2" class="text-right">
                                    {{ __('accounting::_.account_', ['something' => 'نوع']) }}
                                </label>
                                <select class="form-control" id="typeAccount">
                                    <option selected>{{ __('accounting::_.select_account_type') }}</option>
                                    <option value="رئيسى"{{$account->type == "رئيسى" ? "selected": ""}} >   {{ __('accounting::_.main') }}</option>
                                    <option value="رئيسى1" {{$account->type == "رئيسى1" ? "selected": ""}}>   {{ __('accounting::_.main1') }}</option>
                                    <option value="رئيسى2"{{$account->type == "رئيسى2" ? "selected": ""}}>   {{ __('accounting::_.main2') }}</option>
                                    <option value="رئيسى3" {{$account->type == "رئيسى3" ? "selected": ""}}>   {{ __('accounting::_.main3') }}</option>
                                    <option value="فرعى" {{$account->type == "فرعى" ? "selected": ""}}>   {{ __('accounting::_.Subdivision') }}</option>
                                </select>
                            </div>
                            @inject("accounting","\Modules\Accounting\Entities\Account")
                            <div class="col-sm-6" id="dataMains" style="display:none;">
                                <select class="custom-select" size="5" id="dataMain">
                                    <option selected></option>
                                    @foreach($accounting->where('type','رئيسى')->get() as $data)
                                        <option value="{{$data->id}}" {{$account->parent_id == $data->id ? "selected": ""}}>{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6" id="dataMain4" style="display:none;">
                                <select class="custom-select" size="5" id="dataMain1">
                                    <option selected></option>
                                    @foreach($accounting->where('type','رئيسى1')->get() as $data1)
                                        <option value="{{$data1->id}}" {{$account->parent_id == $data1->id ? "selected": ""}}>{{$data1->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6" id="dataMain3" style="display:none;">
                                <select class="custom-select" size="5" id="dataMain2">
                                    <option selected></option>
                                    @foreach($accounting->where('type','رئيسى2')->get() as $data2)
                                        <option value="{{$data2->id}}" {{$account->parent_id == $data2->id ? "selected": ""}}>{{$data2->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6" id="dataSubdivision1" style="display:none;">
                                <select class="custom-select" size="5" id="dataSubdivision">
                                    <option selected></option>
                                    @foreach($accounting->get() as $data3)
                                        <option value="{{$data3->id}}" {{$account->parent_id == $data3->id ? "selected": ""}}>{{$data3->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>

                        <div class="form-row">

                            <div class="col-sm-6">
                                <label data-error="wrong" data-success="right" for="form2" class="text-right">
                                    {{ __('الترحيل الى') }}
                                </label>

                                <select class="form-control" id="typeMenu">
                                    <option selected>{{ __(' الترحيل الى  ') }}</option>
                                    <option value="قائمة دخل" {{$account->typeMenu == "قائمة دخل" ? "selected": ""}}>   {{ __('قائمة الدخل ') }}</option>
                                    <option value="ميزانيه" {{$account->typeMenu == "ميزانيه" ? "selected": ""}}>   {{ __('الميزانيه') }}</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label data-error="wrong" data-success="right" for="form2" class="text-right">
                                    {{ __('نوع الترحيل') }}
                                </label>

                                <select class="form-control" id="typeAccountMenu">
                                    <option selected>{{ __(' نوع الترحيل للقوائم') }}</option>
                                    <option value="مدين" {{$account->typeAccountMenu == "مدين" ? "selected": ""}}>   {{ __('مدين') }}</option>
                                    <option value="دائن" {{$account->typeAccountMenu == "دائن" ? "selected": ""}}>   {{ __('دائن') }}</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-raised btn-raised-primary btn-sm" type="button" id="updateAccount"
                                data-id="{{$account->id}}">Save <i class="fas fa-save ml-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('scripting...')
    <script>

        $(document).ready(function () {
            var typeName = $('#typeAccount').val();
            // alert(typeName);
            if (typeName == "رئيسى") {
                document.getElementById('dataMains').style.display = 'none';
                document.getElementById('dataMain4').style.display = 'none';
                document.getElementById('dataSubdivision1').style.display = 'none';
                document.getElementById('dataMain3').style.display = 'none';
            }
            if (typeName == "رئيسى1") {
                document.getElementById('dataMain4').style.display = 'none';
                document.getElementById('dataSubdivision1').style.display = 'none';
                document.getElementById('dataMain3').style.display = 'none';
                document.getElementById('dataMains').style.display = 'block';
            }
            if (typeName == "رئيسى2") {
                document.getElementById('dataMain4').style.display = 'block';
                document.getElementById('dataSubdivision1').style.display = 'none';
                document.getElementById('dataMain3').style.display = 'none';
                document.getElementById('dataMains').style.display = 'none';

            }
            if (typeName == "رئيسى3") {
                document.getElementById('dataMain3').style.display = 'block';
                document.getElementById('dataMain4').style.display = 'none';
                document.getElementById('dataSubdivision1').style.display = 'none';
                document.getElementById('dataMains').style.display = 'none';
            }
            if (typeName == "فرعى") {
                document.getElementById('dataSubdivision1').style.display = 'block';
                document.getElementById('dataMain3').style.display = 'none';
                document.getElementById('dataMain4').style.display = 'none';
                document.getElementById('dataMains').style.display = 'none';
            }

        });

    </script>
@endsection

