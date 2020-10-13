@extends('admin::layouts.master')

@section('content')

<section class="roles-and-permissions">
    <div class="container">
        @include('admin::layouts.partials._success')
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-3">
                                {{ __('admin::dashboard._roles', ['something' => __('shared::actions.manage')]) }}
                            </h4>
                            <p style="height: 60px;"></p>


                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('admin::privileges.name') }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($roles && $roles->count())
                                    @foreach($roles as $key => $role)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $role->name }}</td>

                                            <td>
                                                <a href="{{ route('Admin::roles.edit', $role->id) }}" class="text-success mr-2">
                                                    <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                </a>
                                                <form style="display: none;" method="POST" action="{{ route('Admin::roles.destroy', $role->id) }}" id="form-{{ $role->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="JavaScript:void(0);" class="text-danger mr-2" onclick="deletePermission({{ $role->id }})">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <a type="submit" class="btn btn-raised btn-raised-primary btn-lg btn-rounded m-1 mt-3 btn-sm" href="{{ route('Admin::roles.create') }}">
                                    &plus; {{ __('shared::actions.new') }}
                                </a>

                            </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection




@section('scripting...')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        function deletePermission(permission_id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    setTimeout(function(){
                        document.getElementById(`form-${permission_id}`).submit();
                    }, 2000);

                }
            });

            return;
            // document.getElementById(`form-${permission_id}`).submit();
        }
    </script>
@endsection


{{-- <div class="loader-bubble loader-bubble-primary m-5"></div> --}}


