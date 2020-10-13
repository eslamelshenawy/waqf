@extends('admin::layouts.master')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <section class="roles-and-permissions">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">{{__('admin::dashboard.inner.editnewuser')}}</div>
                                @if(isset($errors))
                                    @foreach($errors->all() as $error)
                                        <h6 class="alert alert-danger">{{$error}}</h6>
                                    @endforeach
                                @endif
                                @if(session()->has('success-edit'))
                                    <h6 class="alert alert-success">{{session()->get('success-edit')}}</h6>
                                @endif
                                <form action="{{ route('Admin::administrators.update', $admin->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="username">{{__('admin::dashboard.inner.username')}}</label>
                                            <input type="text" id="username" name="username" class="form-control form-control-rounded"  placeholder="Enter username" value="{{$admin->username}}">
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="email">{{__('admin::dashboard.inner.email')}}</label>
                                            <input type="email" id="email" name="email" class="form-control form-control-rounded" placeholder="Enter Email" value="{{$admin->email}}">
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="password">{{__('admin::dashboard.inner.password')}}</label>
                                            <input type="password" id="password" name="password"  class="form-control form-control-rounded" placeholder="Enter password">
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="roles">{{__('admin::dashboard.inner.roles')}}</label>
                                            <select class="form-control form-control-rounded" id="roles" name="role_id">
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}" {{ $admin['roles'][0]->id ==$role->id ? "selected": "" }}>{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <input  type="submit" class="btn btn-primary" value="Submit" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
