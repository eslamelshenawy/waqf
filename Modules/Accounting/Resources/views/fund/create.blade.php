@extends('accounting::layouts.master')

@section('content')

    <!-- ============ Body content start ============= -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card-title">
                            <br>
                            <h4>{{ __('shared::actions.manage') . ' ' . __('accounting::_.fund') }}</h4>

                            <br></div>
                        <hr>
                        <form class="needs-validation" novalidate method="POST"
                              action="{{ route('Accounting::fund.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" id="type" value="{{$type}}">
                            <div class="form-row">
                            <div class="col-md-4 mb-4">
                                @inject('account', '\Modules\Accounting\Entities\Account')
                                <label for="typefund">{{ __('accounting::_.typefund') }}</label>
                                <select class="form-control" name="typefund" id="typefund" required>
                                    <option selected disabled>{{ __('shared::actions.select') }}</option>
                                    @foreach($account->where('type', '!=' ,'رئيسى3' )->get() as $c)
                                        <option value="{{ $c->parent_id }}" {{ old('typefund') == $c->parent_id ? 'selected' : '' }} >{{ $c->name  }}
                                            </option>
                                    @endforeach
                                </select>
                                @error('typefund')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="last-name">{{ __('accounting::_.name_fund') }}</label>
                                <input type="text"
                                       class="field form-control @error('name_fund') border border-danger @enderror"
                                       name="name_fund" value="{{ old('name_fund') }}" id="name_fund"
                                       placeholder="{{ __('accounting::_.name_fund') }}">
                                @error('name_fund')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="col-md-4 mb-4">
                                <label for="balance">{{ __('accounting::_.balance') }}</label>
                                <input type="number"
                                       class="field form-control @error('balance') border border-danger @enderror"
                                       name="balance" value="{{ old('balance') }}" id="balance"
                                       placeholder="{{ __('accounting::_.balance') }}">
                                @error('balance')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>

                            @if($type != 'spot')
                            <div class="col-md-4 mb-4">
                                <label for="number_account">{{ __('accounting::_.number_account') }}</label>
                                <input type="text"
                                       class="field form-control @error('number_account') border border-danger @enderror"
                                       name="number_account" value="{{ old('number_account') }}" id="number_account"
                                       placeholder="{{ __('accounting::_.number_account') }}">
                                @error('number_account')
                                <div>
                                    <span class="badge badge-danger">{{ $message }}</span>
                                </div>
                                @enderror
                            </div>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-raised btn-raised-primary btn-rounded m-1 mt-3">
                                {{ __('shared::actions.create') }}
                            </button>
                        </form>


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
