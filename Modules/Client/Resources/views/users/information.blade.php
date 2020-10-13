@extends('client::layouts.master')

@section('content')
    <section class="roles-and-permissions">
        <div class="container">
            @include('admin::layouts.partials._success')

            <section class="heading">
                <div class="container">
                    <div class="heading__body old-requests">
                        <h1>  {{ __('معلومات عن المبانى والايجارات') }}</h1>
                        <span class="line"></span>
                    </div>
                </div>
            </section>

       <div class="search-results_details" id="advance_added">
           <div class="row">
               <div class="col-md-9">
                   <div class="search_info">
                       <div class="row">
                           <div class="col-md-12">
                               <div class="search-results__action">
                                   <!-- Button trigger modal -->
                                   
                                       <div class="form-group">
                                           @if($informations == null)
                                           <button type="button" class="btn btn-primary" id="orderButton" style="display: block;" data-toggle="modal" data-target="#exampleModal">
                                               طلب الحصول على المعلومات
                                           </button>
                                    @else
                                               @if($informations->is_accepted != true)

                                               <div class="alert alert-warning" role="alert" id="alertOrder" >
                                               تم تقديم الطلب وفى حالة موافقة الاداره سيظهر لك الملف
                                           </div>
                                               @else
                                                   <div class="alert alert-success" role="alert" id="alertOrder" >
                                                       تم  موافقة الاداره سيظهر لك الملف
                                                   </div>
                                           @endif
                                           @endif
                                               <div class="alert alert-warning" role="alert" id="alertOrder" style="display: none ;">
                                                   تم تقديم الطلب وفى حالة موافقة الاداره سيظهر لك الملف
                                               </div>

                                       </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
            @if($informations != null)
            @if($informations->is_accepted == true)
   <div class="search-results_details">
       <div class="row">
           <div class="col-md-9">
               <div class="search_info">
                   @include('client::users.resultInformation')
               </div>
           </div>
       </div>
   </div>
    @endif @endif
</div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
   <div class="modal-content">



       <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">طلب الحصول على المعلومات</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
           </button>
       </div>


       <div class="modal-body">

           <div class="form-row">
               <input type="hidden" id="user_id" value="{{Auth::guard('beneficiary')->user()->id}}">

               <div class="col-md-12">
                   <label for="">سبب الطلب</label>
                   <textarea type="text" name="reason_advance" value="" id="reason" class="form-control ">

                   </textarea>
               </div>
           </div>

       </div>
       <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary" id="submitOrder">Save </button>
       </div>
   </div>
</div>
</div>

@endsection

@section('scripting...')
<script>
</script>
@endsection




{{-- <div class="loader-bubble loader-bubble-primary m-5"></div> --}}


