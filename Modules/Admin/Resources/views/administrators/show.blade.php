@extends('admin::layouts.master')
@section('content')
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mb-4">
                            <div class="card-title">
                                <div class="p-3">
                                    <span>User</span>
                                    <a class="btn btn-info" href="{{route('users.create')}}">Add New User</a>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(session()->has('delete'))
                                    <h6 class="alert alert-success">{{session()->get('delete')}}</h6>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $admin)
                                        <tr>
                                            <th scope="row">{{$admin->id}}</th>
                                            <td>{{$admin->username}}</td>
                                            <td>{{$admin->email}}</td>
                                            <td>
                                                <form action="{{route('users.destroy', $admin->id)}}" method="post" class="form-submit">
                                                    @csrf
                                                    <input type="submit" value="Delete" class="btn btn-danger form-control" {{$admin->hasAnyRole('super-admin') ? 'disabled' : ''}}>
                                                </form>
                                                <div class="mb-2"></div>
                                                <div class="text-center">
                                                    <a href="{{route('Admin::users.edit', $admin->id)}}" class="btn btn-success">Edit User</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
