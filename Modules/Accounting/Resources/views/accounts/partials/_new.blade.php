<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">{{ __('accounting::_.account_', ['something' => 'جديد']) }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <input type="text" id="codeAccount"  class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form3">
                        {{ __('accounting::_.account_', ['something' => 'كود']) }}
                    </label>
                </div>

                <div class="md-form mb-4">
                    <input type="text" id="nameAccount"  class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        {{ __('accounting::_.account_', ['something' => 'اسم']) }}
                    </label>
                </div>
                <div class="md-form mb-4">
                    <input type="number" id="debitAccount" value="0" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        {{ __('accounting::_.account_', ['something' => 'مدين ']) }}
                    </label>
                </div>
                <div class="md-form mb-4">
                    <input type="number" id="creditAccount" value="0"  class="form-control validate">
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        {{ __('accounting::_.account_', ['something' => 'دائن ']) }}
                    </label>
                </div>

                <div class="md-form mb-4">
                    <select class="form-control" id="typeAccount" >
                        <option selected >{{ __('accounting::_.select_account_type') }}</option>
                        <option value="رئيسى">   {{ __('accounting::_.main') }}</option>
                        <option value="رئيسى1">   {{ __('accounting::_.main1') }}</option>
                        <option value="رئيسى2">   {{ __('accounting::_.main2') }}</option>
                        <option value="رئيسى3">   {{ __('accounting::_.main3') }}</option>
                        <option value="فرعى">   {{ __('accounting::_.Subdivision') }}</option>
                    </select>
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        {{ __('accounting::_.account_', ['something' => 'نوع']) }}
                    </label>
                </div>
                @inject("accounting","\Modules\Accounting\Entities\Account")
                <div class="md-form mb-4" id="dataMains" style="display:none;">
                    <select class="custom-select" size="5" id="dataMain" >
                        <option selected></option>
                    @foreach($accounting->where('type','رئيسى')->get() as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="md-form mb-4" id="dataMain4" style="display:none;">
                    <select class="custom-select" size="5" id="dataMain1" >
                        <option selected></option>
                    @foreach($accounting->where('type','رئيسى1')->get() as $data1)
                        <option value="{{$data1->id}}">{{$data1->name}}</option>
                            @endforeach
                    </select>
                </div>
                <div class="md-form mb-4" id="dataMain3" style="display:none;">
                    <select class="custom-select" size="5" id="dataMain2">
                        <option selected></option>
                    @foreach($accounting->where('type','رئيسى2')->get() as $data2)
                        <option value="{{$data2->id}}">{{$data2->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md-form mb-4" id="dataSubdivision1" style="display:none;">
                    <select class="custom-select" size="5"id="dataSubdivision" >
                        <option selected></option>
                    @foreach($accounting->get() as $data3)
                        <option value="{{$data3->id}}">{{$data3->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md-form mb-4">
                    <select class="form-control" id="typeMenu" >
                        <option selected >{{ __(' الترحيل الى  ') }}</option>
                        <option value="قائمة دخل">   {{ __('قائمة الدخل ') }}</option>
                        <option value="ميزانيه">   {{ __('الميزانيه') }}</option>
                    </select>
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        {{ __('الترحيل الى') }}
                    </label>
                </div>
                <div class="md-form mb-4">
                    <select class="form-control" id="typeAccountMenu" >
                        <option selected >{{ __(' نوع الترحيل للقوائم') }}</option>
                        <option value="مدين">   {{ __('مدين') }}</option>
                        <option value="دائن">   {{ __('دائن') }}</option>
                    </select>
                    <label data-error="wrong" data-success="right" for="form2" class="text-right">
                        {{ __('نوع الترحيل') }}
                    </label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-raised btn-raised-primary btn-sm" type="button" id="addaccount">Save <i class="fas fa-save ml-1"></i></button>
            </div>
        </div>
    </div>
</div>

