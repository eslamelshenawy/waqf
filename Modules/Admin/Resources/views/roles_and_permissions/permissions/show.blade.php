@extends('admin::layouts.master')
@section('content')
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <section class="roles-and-permissions">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">{{__('admin::dashboard.inner.addnewuser')}}</div>
                            @if(isset($errors))
                                @foreach($errors->all() as $error)
                                    <h6 class="alert alert-danger">{{$error}}</h6>
                                @endforeach
                            @endif
                            @if(session()->has('success-edit'))
                                <h6 class="alert alert-success">{{session()->get('success-edit')}}</h6>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection