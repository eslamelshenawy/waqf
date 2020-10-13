@extends('admin::layouts.master')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-title">
                        <!--<div class="p-3">-->
                        <!--    <span>User</span>-->
                        <!--    <a class="btn btn-info" href="{{route('Admin::beneficiaries.create')}}">Add New Beneficiary</a>-->
                        <!--</div>-->
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
                                <th scope="col">mobile</th>
                                <th scope="col">رقم الهويه</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                     <th scope="row">{{$beneficiary->id}}</th>
                                    <td>{{$beneficiary->name}}</td>
                                    <td>{{$beneficiary->email}}</td>
                                    <td>
                                        {{$beneficiary->mobile}}
                                    </td>
                                     <td>
                                        {{$beneficiary->identity_number}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
