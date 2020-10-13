@extends('accounting::layouts.master')

@section('content')

    <!-- ============ Body content start ============= -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
{{--                <ul class="nav nav-tabs justify-content-end mb-4" id="myTab" role="tablist">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="true">Invoice</a>--}}
{{--                    </li>--}}

{{--                    --}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit</a>--}}
{{--                    </li>--}}

{{--                </ul>--}}
                <div class="card">

                    <div class="tab-content" id="myTabContent">
                        @include('accounting::invoices.partials._show')
                        @include('accounting::invoices.partials._edit')
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- ============ Body content End ============= -->



@endsection


@section('scripting...')
<script>

</script>
@endsection
