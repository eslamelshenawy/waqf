@section('footer-content')
    @inject("page","\App\Page")
    @inject("setting","\App\GenerallSetting")
    @php
        $settings=$setting->find(1);
    @endphp
    <footer id="foot">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-details--logo">
                        <div class="logo__footer">
                            <img src="{{ asset('img/logo-footer.png') }}" alt="">
                        </div>
                        <p>

                            {!!  \Illuminate\Support\Str::limit($page->where('slug', 'about')->first()->content , $limit = 150) !!}
                        </p>
                        <div class="copy__right">
                            جميع الحقوق محفوظة لدي منصة أوقاف الفاضل 2020
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-details__link">
                        <ul>
                            <li><a href="{{url('/estates')}}">الإعلانات العقارية</a></li>
                            <li><a href="{{url('gallery')}}">الصور</a></li>
                            <li><a href="{{url('pages/contact')}}">تواصل معنا</a></li>
                            <li><a href="{{url('pages/about')}}">من نحن</a></li>
                            <li><a href="{{url('pages/terms_policy')}}">سياسة الشروط</a></li>
                            <li><a href="{{url('pages/privacy_policy')}}">خصوصية الموقع</a></li>
                            {{--                                                <li><a href="#">English</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="Subscribe__newsletter__social">
                        <subscribe-form></subscribe-form>
                        <div class="social">
                            <div class="icon-header">
                                <ul class="list-inline">
                                    <li class="wow rollIn"><a href="{{@$settings->facebook_url}}"><i class="fab fa-facebook-f"> </i></a></li>
                                    <li class="wow rollIn"><a href="{{@$settings->twitter_url}}"><i class="fab fa-twitter"></i> </a></li>
{{--                                    <li class="wow rollIn"><a href="#"><i class="fab fa-google-plus-g">{{@$settings->instagram}}</i></a></li>--}}
                                    <li class="wow rollIn"><a href="{{@$settings->instagram}}"><i class="fab fa-instagram"></i></a></li>
{{--                                    <li class="wow rollIn"><a href="#"><i class="fab fa-youtube">{{@$settings->facebook_url}}</i></a></li>--}}
{{--                                    <li class="wow rollIn"><a href="#"><i class="fab fa-vimeo-v">{{@$settings->facebook_url}}</i></a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@show


<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('js/jquery-ui.min.js') }}"></script>
<script src="{{ url('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ url('vendor/bootstrapv4/js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/fontawesome-all.min.js') }}"></script>
<script src="{{ url('js/mediaelement.min.js') }}"></script>
<script src="{{ url('js/owl.carousel.min.js') }}"></script>
<script src="{{ url('js/owl.carousel2.thumbs.js') }}"></script>
<script src="{{ url('js/rating.js') }}"></script>
<script src="{{ url('js/wow.min.js') }}"></script>
<script>
    new WOW().init();
</script>
<script src="{{ url('js/utils.js') }}"></script>
<script src="{{url('js/axios.min.js')}}"></script>
{{--        <script src="{{ asset('js/axios.min.map') }}"></script>--}}
<script src="{{ url('js/client.js') }}"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="{{adminUrl()}}/js/vendor/pickadate/picker.js"></script>
<script src="{{adminUrl()}}/js/vendor/pickadate/picker.date.js"></script>
{{--<script src="{{adminUrl()}}/js/vendor/pickadate/picker.time.js"></script>--}}

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<script>
    function logout() {
        document.getElementById('logoutForm').submit();
        return false;
    }

    $(document).ready(function () {
        
            $('.maintence_order').click(function () {
           
            var data_id = $(this).attr("data_id");
            // var agencyType = $('.agencyType').val();
            var estate_id = $(this).attr("estate_id"); 
            var agencyType = $(this).attr("agencyType");
            // alert(agencyType);
            document.getElementById("agency_id").value = data_id;
            document.getElementById("apartmentId").value = agencyType;
            document.getElementById("apartment_id").value = estate_id;
        });
        
        $('#submit').click(function () {
            var user_id = $('#user_id').val();
            var reason = $('#reason').val();
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{url('balance/order/send')}}",
                method: 'POST',
                data: {
                    reason: reason,
                    user_id: user_id,
                    _token: token
                },
                success: function (data) {
                    console.log(data);
                    if(data.success !== undefined){
                        alertify.success(data.success);
                        document.getElementById('orderButton').style.display = 'none';
                        document.getElementById('alertOrder').style.display = 'block';

                    }else{
                        alertify.error(data.errors);
                    }

                }

            });
        });

        $('#submitOrder').click(function () {

            var user_id = $('#user_id').val();
            var reason = $('#reason').val();
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{url('information/order/send')}}",
                method: 'POST',
                data: {
                    reason: reason,
                    user_id: user_id,
                    _token: token
                },
                success: function (data) {
                    console.log(data);
                    if(data.success !== undefined){
                        alertify.success(data.success);
                        document.getElementById('orderButton').style.display = 'none';
                        document.getElementById('alertOrder').style.display = 'block';

                    }else{
                        alertify.error(data.errors);
                    }

                }

            });
        });

        $('#send_message').click(function () {
            var title_contact = $('#title_contact').val();
            // alert(title_contact);
            var email_contact = $('#email_contact').val();
            var message_contact = $('#message_contact').val();
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{url('pages/contact_us')}}",
                method: 'POST',
                data: {
                    title_contact: title_contact,
                    message_contact: message_contact,
                    email_contact: email_contact,
                    _token: token
                },
                success: function (data) {
                    // console.log(data.error);
                    if(data.success != undefined){
                        alertify.success(data.success);
                    }else{
                        alertify.error(data.error[0]);
                    }
                    
                }

            });
        });

        $('#send_request').click(function () {
            var order_datepicker_ = $('#order_datepicker_').val();
            // alert(title_contact);
            var d = new Date(order_datepicker_).toISOString();
            var reason_advance = $('#reason_advance').val();
            var number_advance = $('#number_advance').val();
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{url('/advance/store')}}",
                method: 'POST',
                data: {
                    order_datepicker_: order_datepicker_,
                    d: d,
                    number_advance: number_advance,
                    reason_advance: reason_advance,
                    _token: token
                },
                success: function (data) {

                    console.log(data.errors);
                    if(data.success !== undefined){
                        alertify.success(data.success);
                        $('#advance_added').hide();
                        location.reload();
                    }else{
                        alertify.error(data.errors);
                    }
                }

            });
        });

    });

    $(document).ready(function () {
        $('#check_status').hide();
    
        $('#checkstatus').click(function () {
            alertify.error(" تم الحجز لهذا العقار ");
        });

        $('#checkAuth').click(function () {
// var loggedIn = '{{ Auth::guard('beneficiary')->check() ? 'true' : 'false' }}';
 var agency = '{{Auth::guard('agency')->check()}}';
 var beneficiary = '{{Auth::guard('beneficiary')->check()}}';
 var admin = '{{Auth::guard('admin')->check()}}';

            // alert(beneficiary  == 1);
            if(agency == 1 || beneficiary == 1 || admin == 1 ){
                alertify.error("هذا متاح للمستأجرين فقط ");
            }else{
                alertify.error(" يجب عليك التسجيل كمستاجر");
                window.location.href = '{{url('.login')}}';
            }
            
            
            
        });

        $('.maintence_order_notauth').click(function () {
            alertify.error(" يجب عليك التسجيل كمستاجر");
        });

        $('.agree').click(function () {
            var val_stat =$(this).val();
            var order_number =$(this).attr("order_number");
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{route('agency.orders.status')}}",
                method: 'POST',
                data: {
                    val_stat: val_stat,
                    order_number: order_number,
                    _token: token
                },
                success: function (data) {
                    console.log(data);
                    if(data == true){
                        $('#status'+order_number).hide();
                        $('.check_status'+order_number).show();
                        alertify.success('تم الموافقه على الطلب');
                    }
                }
            });
        });

        $('.inquiry_add').click(function () {
            var name =$('#name').val();
            var phone =$('#phone').val();
            var inquiry =$('#inquiry').val();
            var token = '{{ csrf_token() }}';
            console.log(inquiry);
            $.ajax({
                url: "{{route('add.inquiry')}}",
                method: 'POST',
                data: {
                    name: name,
                    inquiry: inquiry,
                    phone: phone,
                    _token: token
                },
                success: function (data) {
                    console.log(data);
                  if(data.success !== undefined){
                        alertify.success('تم الارسال بالنجاح');
                     }else{
                          alertify.error(data.error[0]);
                            }


                }
            });
        });

        $('.delete').click(function () {
            // alert($(this).val());
            var val_stat =$(this).val();
            var order_number =$(this).attr("order_number");
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{route('agency.orders.status')}}",
                method: 'POST',
                data: {
                    val_stat: val_stat,
                    order_number: order_number,
                    _token: token
                },
                success: function (data) {
                    console.log(data);
                    if(data == true){
                        $('#status'+order_number).hide();
                        $('#refused_order'+order_number).show();
                        alertify.success('تم رفض  الطلب');
                    }
                }
            });

        });

        $('input[name=Date_end]').change(function() {
            var Date_end =$(this).val();
            var order_num =$(this).attr("dat_num");
            // var Date_end =$('#Date_end').val();
            //     alert(order_num);
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{route('Client::estate.store.date')}}",
                method: 'POST',
                data: {
                    order_num: order_num,
                    Date_end: Date_end,
                    _token: token
                },
                success: function (data) {
                    console.log(data);
                    if(data == true){
                        $('.enter_date'+order_num).hide();
                        $('.check_status'+order_num).hide();
                        $('#agree_order'+order_num).show();
                        alertify.success('تم إضافة تاريخ القدوم شكرا لك ');
                        location.reload();
                    }else{
                       alertify.error(' يجب  اختيار تاريخ اكبر من  تاريخ تحرير الطلب و تاريخ اليوم');
                    }
                }

            });


        });


    });
    $(document).ready(function () {
        $("#order_datepicker_").pickadate();
        $('.readNoti').click(function () {
            var dataId = $(this).attr("dataId");
            // alert(advancedId);
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{url('read/notification')}}",
                method: 'POST',
                data: {
                    data_id: dataId,
                    _token: token
                },
                success: function (data) {
                    // location.reload();
                }

            });
        });
    });

</script>

@yield('scripting...')
