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
                                {{-- {{ $vouchers->count() }} --}}
                            </caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">رقم السند </th>
                                        <th scope="col">نوع الدفع</th>
                                        <th scope="col">المبلغ المدفوع</th>
                                        <th scope="col">تاريخ السند </th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach($vouchers as $key => $voucher)

                                    @php
                                        $fund=\Modules\Accounting\Entities\Fund::with('account')->find($voucher->paymentable_id);
                                    @endphp
                                    <tr>
                                                <th scope="row">{{++$key}}</th>
                                                <td>{{$voucher->number}}</td>
                                                <td>{{$voucher->document_type}}</td>
                                                <td>{{$voucher->paid_amount}}</td>
                                                <td>{{$voucher->date }}</td>
                                                <td>
                                                    @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('update vouchers'))
                                                        <a href="{{ route('Accounting::vouchers.payments.edit', $voucher->id)}}" class="text-success mr-2">
                                                            <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                                        </a>
                                                    @endif
                                                </td>

                                            </tr>
                                @endforeach


                                </tbody>
                            </table>
                        @if(auth()->user()->hasRole('super-admin') ||auth()->user()->can('create vouchers'))
                            <a class="btn btn-raised btn-raised-primary btn-rounded m-1" href="{{ route('Accounting::vouchers.payments.create') }}">&plus; add</a>
                        @endif
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
