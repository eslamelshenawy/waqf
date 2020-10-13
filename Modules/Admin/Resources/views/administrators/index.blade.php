@extends('admin::layouts.master')
@section('content')
    <section class="roles-and-permissions" id="admin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">


                        <h4 class="card-title mb-3">{{ __('shared::actions.manage') . ' ' . __('admin::dashboard.administrators.it') }}</h4>


                        <div class="table-responsive">
                                <table class="display table table-striped table-bordered dataTable" id="alternative_pagination_table" style="width:100%">
                                <caption>
                                    {{ $administrators->count() }}
                                </caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('shared::commons.name') }}</th>
                                            <th scope="col">{{ __('shared::commons.avatar') }}</th>
                                            <th scope="col">{{ __('shared::commons.email') }}</th>
                                            <th scope="col">{{ __('shared::commons.status') }}</th>
                                            <th scope="col"><i class="i-Check text"></i> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($administrators && $administrators->count())
                                            @foreach($administrators as $administrator)

                                                <tr>
                                                    <th scope="row">{{ $administrator->id }}</th>
                                                    <td>{{ $administrator->name }}</td>
                                                    <td>
                                                        @if( ! is_null($administrator->avatar) )
                                                            <img class="rounded-circle m-0 avatar-sm-table" src="{{ $administrator->avatar_url }}" alt="">
                                                        @else
                                                            <img class="rounded-circle m-0 avatar-sm-table" src="{{adminUrl()}}/images/faces/1.jpg" alt="">
                                                        @endif
                                                    </td>

                                                    <td>{{ $administrator->email }}</td>
                                                    <td>
                                                        <form method="POST" action="{{ route('Admin::administrators.update', $administrator->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            @switch($administrator->is_active)
                                                                @case(1)
                                                                <label class="switch switch-success mr-3">
                                                                    <input type="checkbox" checked name="is_active" onchange="this.form.submit()" value="1">
                                                                    <span class="slider"></span>
                                                                </label>
                                                                    @break
                                                                @case(0)
                                                                <label class="switch switch-success mr-3">
                                                                    <input type="checkbox" name="is_active" onchange="this.form.submit()" value="0">
                                                                    <span class="slider"></span>
                                                                </label>
                                                                    @break
                                                            @endswitch
                                                        </form>

                                                    </td>
                                                    <td>
                                                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update administrators'))
                                                        <a href="{{route('Admin::administrators.edit', $administrator->id)}}" class="text-success mr-2">
                                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                        </a>
                                                        @endif
{{--                                                        <a href="#" class="text-danger mr-2">--}}
{{--                                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>--}}
{{--                                                        </a>--}}
                                                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('delete administrators'))
                                                        <form style="display: none;" method="POST" action="{{ route('Admin::administrators.destroy', $administrator->id) }}" id="form-{{ $administrator->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="JavaScript:void(0);" class="text-danger mr-2" onclick="deletePermission({{ $administrator->id }})">
                                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                        </a>
                                                            @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>

                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->can('create administrators'))

                                <a class="btn btn-raised btn-raised-primary btn-rounded btn-sm m-1" href="{{ route('Admin::administrators.create') }}">
                                    &plus; {{ __('shared::actions.add') }}
                                </a>
                            @endif
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@section('scripting...')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        $('#multicolumn_ordering_table').DataTable({
            language: {
                "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
                "sLoadingRecords": "جارٍ التحميل...",
                "sProcessing":   "جارٍ التحميل...",
                "sLengthMenu":   "أظهر _MENU_ مدخلات",
                "sZeroRecords":  "لم يعثر على أية سجلات",
                "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix":  "",
                "sSearch":       "ابحث:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "الأول",
                    "sPrevious": "السابق",
                    "sNext":     "التالي",
                    "sLast":     "الأخير"
                },
                "oAria": {
                    "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                    "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                }
            }
        });

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

@endsection

