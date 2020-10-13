@extends('accounting::layouts.master')
@section('content')

<section class="roles-and-permissions">
    <div class="container">
        @include('accounting::layouts.partials._success')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">

                    <h4 class="card-title mb-3">Manage Payments Voucher</h4>

                    <div class="table-responsive">
                            <table class="display table table-striped table-bordered dataTable" id="alternative_pagination_table" style="width:100%">
                            <caption>
                                {{ $cheques->count() }}
                            </caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Journal No.</th>
                                        <th scope="col">Debit</th>
                                        <th scope="col">Credit</th>
                                        <th scope="col">Verified</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                    @if($cheques && $cheques->count())
                                        @foreach($cheques as $index => $cheque)
                                            <tr>
                                                <th scope="row">{{ ++$index }}</th>
                                                <td>{{ $cheque->code }}</td>
                                                <td>{{ $cheque->debit }}</td>



                                                <td>
                                                    <a href="" class="text-success mr-2">
                                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                    </a>
                                                    <a href="#" class="text-danger mr-2">
                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>

                            <a class="btn btn-raised btn-raised-primary btn-rounded m-1" href="{{ route('Accounting::journals.create') }}">&plus; add</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripting...')
    <script>


    </script>
@endsection
