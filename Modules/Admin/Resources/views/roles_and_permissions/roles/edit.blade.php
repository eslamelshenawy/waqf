@extends('admin::layouts.master')
@section('content')
    <section class="tenants">
        <div class="container" id="tenantContainer">
            @include('admin::layouts.partials._success')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="card-title"><br><h4>{{ __('admin::privileges.role_', ['something' => __('shared::actions.new')]) }}</h4><br></div>

                            <hr>
                            <form class="needs-validation" novalidate method="POST" action="{{ route('Admin::roles.store') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">{{ __('admin::privileges._role', ['something' => __('admin::privileges.name')]) }}</label>
                                        <input required="required" type="text" class="field form-control @error('name') border border-danger @enderror" name="name"
                                               autocomplete="off" id="roleName1" value="{{ old('role_name',$roles->name) }}" placeholder="{{ __('admin::privileges._role', ['something' => __('admin::privileges.name')]) }}">
                                        @error('name')
                                        <div>
                                            <span class="badge badge-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row mt-2">
                                    <div class="col-md-12">
                                        <form method="POST" action="{{ route('Admin::syncing') }}">
                                            <button class="btn btn-raised btn-raised-primary shadow" type="button" onclick="syncing()">
                                                <i class="fas fa-sync-alt"></i>&nbsp;&nbsp;{{ __('admin::privileges._permissions', ['something' => __('shared::actions.sync')]) }}
                                            </button>
                                        </form>
                                    </div>

                                </div>


                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tr>
                                                    <td></td>
                                                    <td scope="col">Create</td>
                                                    <td scope="col">Read</td>
                                                    <td scope="col">Update</td>
                                                    <td scope="col">Delete</td>
                                                </tr>
                                                <form method="POST" action="{{ route('Admin::roles.update', $roles->id) }}" name="create_role" id="createRole">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="name" id="roleName2">
                                                    @foreach(getModels() as $key=> $model)
                                                    
                                                    
                                                       @php
                                                       $model = str_replace('.php', '', $model);
                                                      $create = "create " . plural(strtolower($model));
                                                      $read = "read " . plural(strtolower($model));
                                                      $update = "update " . plural(strtolower($model));
                                                      $delete = "delete " . plural(strtolower($model));
                                                       @endphp
                                                       
                                                        <tr>
                                                            @csrf
                                                            <td>{{ $model = str_replace('.php', '', $model) }}</td>
                                                            <td><input type="checkbox" class="checkbox" name="create[]" value="{{ $model }}"  @foreach($roles['permissions'] as $role) {{$role['name'] === $create ? 'checked' : ''}} @endforeach></td>
                                                            <td><input type="checkbox" class="checkbox" name="read[]" value="{{ $model }}" @foreach($roles['permissions'] as $role) {{$role['name'] === $read ? 'checked' : ''}} @endforeach></td>
                                                            <td><input type="checkbox" class="checkbox" name="update[]" value="{{ $model }}" @foreach($roles['permissions'] as $role) {{$role['name']  === $update ? 'checked' : ''}} @endforeach></td>
                                                            <td><input type="checkbox" class="checkbox" name="delete[]" value="{{ $model }}" @foreach($roles['permissions'] as $role) {{$role['name']  === $delete ? 'checked' : ''}} @endforeach></td>
                                                        </tr>
                                                    @endforeach
                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                {{--                                    <div class="form-row">--}}

                                {{--                                        @foreach($permissions as $key => $permission)--}}
                                {{--                                            <div class="col-md-3 mb-3">--}}
                                {{--    --}}{{--                                                <div class="card-title">Users</div>--}}
                                {{--                                                <label class="checkbox checkbox-primary">--}}
                                {{--                                                    <input type="checkbox" checked="checked" name="permissions[is_checked][]" value="{{ $key }}">--}}
                                {{--                                                    <input type="hidden" value="{{ $permission->name }}" name="permissions[name][]">--}}
                                {{--                                                    <span>{{ $permission->name }}</span>--}}
                                {{--                                                    <span class="checkmark"></span>--}}
                                {{--                                                </label>--}}
                                {{--                                            </div>--}}
                                {{--                                        @endforeach--}}

                                {{--                                    </div>--}}


                                <button type="submit"
                                        class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3"
                                        onclick="document.querySelector('#roleName2').value = document.querySelector('#roleName1').value;  document.querySelector('#createRole').submit()"><i class="fas fa-save"></i>&nbsp;&nbsp;{{ __('shared::actions.save') }}</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection




