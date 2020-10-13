@extends('accounting::layouts.master')
@md
@section('content')
    <section class="roles-and-permissions">
        <div class="container" id="app">
            @include('accounting::layouts.partials._success')
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            <form class="needs-validation" novalidate method="POST"
                      action="{{ url('en/accounting/accounts/create/journal') }}"
                      autocomplete="off" enctype="multipart/form-data">
                @csrf
                @php
                $id =\Modules\Accounting\Entities\Journal::count();
               
                @endphp
                    <div class="col-md-12">
                        <div class="card mb-8">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!-- Editable table -->
                                    <div class="card">
                                        <div class="card-body">
                                            <!--Grid column-->
                                            <div class="col-md-12">
                                                <label for="number"
                                                       class="">{{ __('accounting::_.journal_', ['something' => __('accounting::_.number')]) }}</label>

                                                <input type="number" id="number" name="number" class="form-control @error('user_id_in') border border-danger @enderror" value="{{++$id}}" disabled
                                                >
                                                 @error('user_id_in')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-md-12">
                                                <label for="date" class="">{{ __('shared::commons.date_at') }}</label>

                                                <input type="date" id="date_at" name="date_at" value="{{old('date_at')}}"
                                                       class="form-control @error('date_at') border border-danger @enderror">
                                                        @error('date_at')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>
                                            <!--Grid column-->
                                            <!--Grid column-->
                                            <div class="col-md-12" style="margin-bottom: 20px;">
                                                <label for="message">{{ __('shared::commons.details.it') }}</label>

                                                <textarea type="text" id="message" name="message" rows="2"
                                                          class="form-control md-textarea @error('message') border border-danger @enderror">{{old('message')}}</textarea>
                                            @error('message')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                            <div id="table" class="table-editable">
                                                <table id="tableB" class="table table-bordered table-responsive-md table-striped text-center">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">{{ __('accounting::_.account') }}</th>
                                                        <th class="text-center">{{ __('accounting::_.debit') }}</th>
                                                        <th class="text-center">{{ __('accounting::_.credit') }}</th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tableBody">
                                                    <tr>
                                                        <td class="pt-3-half" contenteditable="false">#</td>
                                                        <td class="pt-3-half" contenteditable="false">
                                                            <select class="custom-select custom-select-sm @error('account_id[0]') border border-danger @enderror" id="account_id" name="account_id[0]">
                                                                @foreach(\Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code') as  $account)
                                                                    <option value="{{$account->id}}" {{old('account_id[0]' == $account->id ? "selected" : "") }}>{{$account->name}} && {{$account->code}}</option>
                                                                @endforeach
                                                            </select>
                                                             @error('account_id')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                                        </td>
                                                        <td class="pt-3-half" contenteditable="true">
                                                            <input id="debit" name="debit[0]" value="{{old('debit[0]' ,0)}}" class="@error('debit[0]') border border-danger @enderror"   type="number"/>
 @error('debit[0]')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                                        </td>
                                                        <td class="pt-3-half " contenteditable="true">
                                                            <input id="credit"  name="credit[0]" value="{{old('credit[0]' , 0)}}"  class="@error('credit[0]') border border-danger @enderror" type="number"/>
                                                             @error('credit[0]')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                                        </td>
                                                        <td>
                                                            <p class="@error('messageError')  @enderror" style="display: @error('messageError') block @enderror none; ">
                                                                <div class="alert alert-danger @error('messageError') border border-danger @enderror" role="alert">
                                                                 يجب ان يكون القيد متزن 
                                                                 </div></p>
                                                         @error('messageError')
                                                <div>
                                                    <span class="badge badge-danger">{{ $message }}</span>
                                                </div>
                                                @enderror
                                                        </td>
                                                    </tr>
                                                    
                                                    @if(old('account_id[1]'))
                                                    
                                                    <tr>
                                                        <td contenteditable="false" class="pt-3-half">#</td>
                                                        <td contenteditable="false" class="pt-3-half">
                                                            <select class="custom-select custom-select-sm" name="account_id[1]"
                                                                                                              id="account_id">
                                                                @foreach(\Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code') as  $account)
                                                                    <option value="{{$account->id}}" {{old('account_id[1]' == $account->id ? "selected" : "") }}>{{$account->name}} && {{$account->code}}</option>
                                                                @endforeach
                                                            </select></td>
                                                        <td contenteditable="true" class="pt-3-half"><input type="number" name="debit[1]" id="debit"></td>
                                                        <td contenteditable="true" class="pt-3-half"><input type="number" name="credit[1]" id="credit"></td>
                                                        <td><span class="table-remove"><button type="button"
                                                                                               class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light delete-row">إلغاء</button></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    @endif
                                                    
                                                     @if(old('account_id[2]'))
                                                    
                                                    <tr>
                                                        <td contenteditable="false" class="pt-3-half">#</td>
                                                        <td contenteditable="false" class="pt-3-half">
                                                            <select class="custom-select custom-select-sm" name="account_id[2]"
                                                                                                              id="account_id">
                                                                @foreach(\Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code') as  $account)
                                                                    <option value="{{$account->id}}" {{old('account_id[0]' == $account->id ? "selected" : "") }}>{{$account->name}} && {{$account->code}}</option>
                                                                @endforeach
                                                            </select></td>
                                                        <td contenteditable="true" class="pt-3-half"><input type="number" name="debit[2]" id="debit"></td>
                                                        <td contenteditable="true" class="pt-3-half"><input type="number" name="credit[2]" id="credit"></td>
                                                        <td><span class="table-remove"><button type="button"
                                                                                               class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light delete-row">إلغاء</button></span>
                                                        </td>
                                                    </tr>
                                                    
                                                    @endif
                                                    
                                                    
                                                    
                                                    </tbody>
                                                </table>
                                                <span class="table-add float-left mb-3 mr-2">
                                                <a href="#!" class="text-success"  id="appendColumn"><i
                                                            class="fas fa-plus fa-2x" aria-hidden="true"></i></a>
                                            </span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Editable table -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <button class="btn btn-raised btn-raised-primary btn-sm" type="submit"
                                id="addAccount">Save <i class="fas fa-save ml-1"></i>
                        </button>
                    </div>

                    <!--Grid column-->
                </form>

        </div>
    </section>


    {{--    <button class="btn btn-raised btn-raised-primary btn-rounded-2 btn-sm m-1" @click="demoMessage()">--}}
    {{--        <i class="fas fa-plus"></i> &nbsp;&nbsp;New Account--}}
    {{--</button>--}}

@endsection

@push('styles...')
@endpush

@push('scripts...')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
@endpush

@section('styling...')
    <style>
        .pt-3-half {
            padding-top: 1.4rem;
        }
    </style>
@endsection

@section('scripting...')
    {{--  Start of Vue  --}}

    <script>
        $(document).ready(function () {
            var i=0;
            $('#appendColumn').click(function () {
                i++;
                $('#tableB > tbody:last-child').append('<tr><td contenteditable="false" class="pt-3-half">#</td><td contenteditable="false" class="pt-3-half">' +
                    '<select class="custom-select custom-select-sm" name="account_id['+i+']" id="account_id">' +
                    '@foreach(\Modules\Accounting\Entities\Account::with(['account', 'childes'])->get()->sortBy('code') as  $account)<option value="{{$account->id}}">{{$account->name}}</option>@endforeach' +
                     '</select></td> <td contenteditable="true" class="pt-3-half">' +
                    '<input type="number" name="debit['+i+']" id="debit"></td> <td contenteditable="true" class="pt-3-half"><input type="number" name="credit['+i+']" id="credit"></td>' +
                    ' <td><span class="table-remove">' +
                    '<button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light delete-row">'
                    + 'إلغاء' +
                    '</button></span></td></tr>');

             });
            // Find and remove selected table rows
            $(document).delegate('.delete-row', 'click', function () {
                alert('fdfd');
                $(this).closest('tr').remove();
            });

            {{--$('#addAccount').click(function () {--}}
            {{--    var date_at = $('#date_at').val();--}}
            {{--    // alert(title_contact);--}}
            {{--    // var d = new Date(date_at).toISOString();--}}
            {{--    var number = $('#number').val();--}}
            {{--    var message = $('#message').val();--}}
            {{--    var debit = $('#debit').val();--}}
            {{--    var credit = $('#credit').val();--}}
            {{--    var account_id = $('#account_id').val();--}}
            {{--    var token = '{{ csrf_token() }}';--}}
            {{--    $.ajax({--}}
            {{--        url: "{{url('/api/accounts/create/journal')}}",--}}
            {{--        method: 'POST',--}}
            {{--        data: {--}}
            {{--            account_id: account_id,--}}
            {{--            // d: d,--}}
            {{--            credit: credit,--}}
            {{--            debit: debit,--}}
            {{--            message: message,--}}
            {{--            number: number,--}}
            {{--            _token: token--}}
            {{--        },--}}
            {{--        success: function (data) {--}}
            {{--             alertify.success('dsdsdsdsdsd');--}}
            {{--                // $('#advance_added').hide();--}}
            {{--                // location.reload();--}}

            {{--        }--}}

            {{--    });--}}

            {{--});--}}

        });
    </script>
@endsection
