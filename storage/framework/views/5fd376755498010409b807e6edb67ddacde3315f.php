<?php $__env->startSection('footer-content'); ?>
    <?php $page = app('\App\Page'); ?>
    <?php $setting = app('\App\GenerallSetting'); ?>
    <?php
        $settings=$setting->find(1);
    ?>
    <footer id="foot">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-details--logo">
                        <div class="logo__footer">
                            <img src="<?php echo e(asset('img/logo-footer.png')); ?>" alt="">
                        </div>
                        <p>

                            <?php echo \Illuminate\Support\Str::limit($page->where('slug', 'about')->first()->content , $limit = 150); ?>

                        </p>
                        <div class="copy__right">
                            جميع الحقوق محفوظة لدي منصة أوقاف الفاضل 2020
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="footer-details__link">
                        <ul>
                            <li><a href="<?php echo e(url('/estates')); ?>">الإعلانات العقارية</a></li>
                            <li><a href="<?php echo e(url('gallery')); ?>">الصور</a></li>
                            <li><a href="<?php echo e(url('pages/contact')); ?>">تواصل معنا</a></li>
                            <li><a href="<?php echo e(url('pages/about')); ?>">من نحن</a></li>
                            <li><a href="<?php echo e(url('pages/terms_policy')); ?>">سياسة الشروط</a></li>
                            <li><a href="<?php echo e(url('pages/privacy_policy')); ?>">خصوصية الموقع</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="Subscribe__newsletter__social">
                        <subscribe-form></subscribe-form>
                        <div class="social">
                            <div class="icon-header">
                                <ul class="list-inline">
                                    <li class="wow rollIn"><a href="<?php echo e(@$settings->facebook_url); ?>"><i class="fab fa-facebook-f"> </i></a></li>
                                    <li class="wow rollIn"><a href="<?php echo e(@$settings->twitter_url); ?>"><i class="fab fa-twitter"></i> </a></li>

                                    <li class="wow rollIn"><a href="<?php echo e(@$settings->instagram); ?>"><i class="fab fa-instagram"></i></a></li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php echo $__env->yieldSection(); ?>


<script src="<?php echo e(url('js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(url('js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(url('js/jquery.fancybox.min.js')); ?>"></script>
<script src="<?php echo e(url('vendor/bootstrapv4/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('js/fontawesome-all.min.js')); ?>"></script>
<script src="<?php echo e(url('js/mediaelement.min.js')); ?>"></script>
<script src="<?php echo e(url('js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(url('js/owl.carousel2.thumbs.js')); ?>"></script>
<script src="<?php echo e(url('js/rating.js')); ?>"></script>
<script src="<?php echo e(url('js/wow.min.js')); ?>"></script>
<script>
    new WOW().init();
</script>
<script src="<?php echo e(url('js/utils.js')); ?>"></script>
<script src="<?php echo e(url('js/axios.min.js')); ?>"></script>

<script src="<?php echo e(url('js/client.js')); ?>"></script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/pickadate/picker.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/pickadate/picker.date.js"></script>


<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<script>
    function logout() {
        document.getElementById('logoutForm').submit();
        return false;
    }

    $(document).ready(function () {
        $('#submit').click(function () {
            var user_id = $('#user_id').val();
            var reason = $('#reason').val();
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(url('balance/order/send')); ?>",
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
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(url('information/order/send')); ?>",
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
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(url('pages/contact_us')); ?>",
                method: 'POST',
                data: {
                    title_contact: title_contact,
                    message_contact: message_contact,
                    email_contact: email_contact,
                    _token: token
                },
                success: function (data) {
                    console.log(data);
                    alertify.success(data.success);
                }

            });
        });

        $('#send_request').click(function () {
            var order_datepicker_ = $('#order_datepicker_').val();
            // alert(title_contact);
            var d = new Date(order_datepicker_).toISOString();
            var reason_advance = $('#reason_advance').val();
            var number_advance = $('#number_advance').val();
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(url('/advance/store')); ?>",
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
        $('#maintence_order').click(function () {
            var data_id = $(this).attr("data_id");
            var estate_id = $(this).attr("estate_id");
            // alert(estate_id);
            document.getElementById("agency_id").value = data_id;
            document.getElementById("apartment_id").value = estate_id;
        });
        $('#checkstatus').click(function () {
            alertify.error(" تم الحجز لهذا العقار ");
        });

        $('#checkAuth').click(function () {
            alertify.error(" يجب عليك التسجيل كمستاجر");
        });

        $('.maintence_order_notauth').click(function () {
            alertify.error(" يجب عليك التسجيل كمستاجر");
        });

        $('.agree').click(function () {
            var val_stat =$(this).val();
            var order_number =$(this).attr("order_number");
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(route('agency.orders.status')); ?>",
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
            var token = '<?php echo e(csrf_token()); ?>';
            console.log(inquiry);
            $.ajax({
                url: "<?php echo e(route('add.inquiry')); ?>",
                method: 'POST',
                data: {
                    name: name,
                    inquiry: inquiry,
                    phone: phone,
                    _token: token
                },
                success: function (data) {
                    console.log(data);
                    alertify.success('تم الارسال بالنجاح');

                }
            });
        });

        $('.delete').click(function () {
            // alert($(this).val());
            var val_stat =$(this).val();
            var order_number =$(this).attr("order_number");
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(route('agency.orders.status')); ?>",
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
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(route('Client::estate.store.date')); ?>",
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
                        alertify.error('يجب اختيار تاريخ اكبر من تاريخ اليوم');
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
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(url('read/notification')); ?>",
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

<?php echo $__env->yieldContent('scripting...'); ?>
<?php /**PATH /home/mmekkawy/Projects/waqf-master/Modules/Client/Resources/views/layouts/footer.blade.php ENDPATH**/ ?>