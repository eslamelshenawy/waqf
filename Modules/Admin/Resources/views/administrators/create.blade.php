@extends('admin::layouts.master')

@section('content')

    <section class="roles-and-permissions">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                        <div class="card-title">{{ __('admin::dashboard.administrators.administrator') . ' ' . __('shared::actions.new')}}</div>
                        <form class="needs-validation" novalidate method="POST" action="{{ route('Admin::administrators.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">{{ __('shared::commons.name') }}</label>
                                    <input type="text" class="form-control @error('name') border border-danger @enderror"
                                           name="name" autocomplete="off" id="name"
                                           placeholder="{{ __('shared::commons.name') }}" required>
                                    @error('name')
                                    <div>
                                        <span class="badge badge-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last-name">{{ __('shared::commons.email') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="emailValidation">@</span>
                                        </div>
                                        <input type="email" class="form-control @error('email') border border-danger @enderror"
                                               id="email" name="email" placeholder="{{ __('shared::commons.email') }}" autocomplete="off"
                                               aria-describedby="emailValidation" required>

                                    </div>
                                    @error('email')
                                    <div>
                                        <span class="badge badge-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="password">{{ __('shared::commons.password') }}</label>
                                    <input type="password" name="password" class="form-control @error('password') border border-danger @enderror"
                                           id="password" placeholder="{{ __('shared::commons.password') }}" autocomplete="off" required>
                                    @error('password')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation">{{ __('shared::commons.password_confirmation') }}</label>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') border border-danger @enderror"
                                           id="password-confirmation" placeholder="{{ __('shared::commons.password_confirmation') }}" autocomplete="off" required>
                                    @error('password_confirmation')
                                        <div>
                                            <span class="badge badge-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>


                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="roleId">{{ __('admin::dashboard.role') . ' ' . __('shared::commons.and') . ' ' . __('admin::dashboard.permissions.it') }}</label>
                                    @inject('role', 'Spatie\Permission\Models\Role')
                                    <select class="form-control" id="roleId" name="role_id">
                                        <option selected disabled>
                                            {{ __('admin::dashboard._role', ['something' => __('shared::actions.select')]) }}
                                        </option>
                                        @foreach($role->where('guard_name', 'admin')->get() as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('role_id')
                                    <div>
                                        <span class="badge badge-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3 mt-3">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1">
                                        <label class="custom-control-label" for="isActive">
                                            {{ __('shared::commons.active') }}
                                        </label>
                                    </div>
                                </div>
                            </div>



                            <button class="btn btn-raised btn-raised-primary btn-rounded m-1" type="submit">
                                <i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('shared::actions.create') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection


@section('scripting...')
<script>
    document.getElementById('first-name').value = '';
    document.getElementById('last-name').value = '';
    document.getElementById('email').value = '';

    var email = document.getElementById('email');

    email.addEventListener('keyup', function(){
        console.log('Typing');
    });
</script>
@endsection
