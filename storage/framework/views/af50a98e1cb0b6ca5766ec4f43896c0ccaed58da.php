
<?php echo $__env->make('accounting::layouts.partials._copyright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/jquery-3.3.1.min.js"></script>

<script src="<?php echo e(adminUrl()); ?>/js/vendor/bootstrap.bundle.min.js"></script>


<script src="<?php echo e(adminUrl()); ?>/js/vendor/perfect-scrollbar.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/datatables.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/pickadate/picker.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/pickadate/picker.date.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/pickadate/picker.time.js"></script>

<script src="<?php echo e(adminUrl()); ?>/js/vendor/echarts.min.js"></script>

<script src="<?php echo e(adminUrl()); ?>/js/es5/echart.options.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/es5/dashboard.v1.script.min.js"></script>

<script src="<?php echo e(adminUrl()); ?>/js/tagging.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/invoice.script.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/vendor/tagging.script.js"></script>

<script src="<?php echo e(adminUrl()); ?>/js/es5/script.min.js"></script>
<script src="<?php echo e(adminUrl()); ?>/js/es5/sidebar.large.script.min.js"></script>






















<script src="/vendor/bootstrapv4/js/bootstrap.bundle.js"></script>
<script src="/vendor/bootstrapv4/js/bootstrap.js"></script>

<script src="/js/all.min.js"></script>

<script src="<?php echo e(adminUrl()); ?>/js/datatables.script.js"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<script src="/js/axios.min.js"></script>

<?php echo $__env->yieldPushContent('scripts...'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="/js/utils.js"></script>


<script>

    window.onload = async function () {
        let loading = setTimeout(function (e) {
            document.getElementById('app').style.display = 'none';
            document.getElementById('spinner').style.display = 'block';
            // document.getElementById('spinner').style.height = '400px';
            document.getElementById('spinner').style.marginBottom = '100';
        });

        await setTimeout(function (e) {
            clearTimeout(loading);
            document.getElementById('app').style.display = 'block';
            document.getElementById('spinner').remove();
        }, 1000);
    };

    var syncing = function(){
        axios.post('<?php echo e(route("Admin::syncing")); ?>')
            .then((response) => {
                location.reload();
            })
    }

    $(document).ready(function () {
        $('.Name_user').select2({
            placeholder: 'Select an item',
            ajax: {
                url: '<?php echo e(url("en/accounting/vouchers/usersajax")); ?>',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
        $('.Name_tenant_out').select2({
            placeholder: 'Select an item',
            ajax: {
                url: '<?php echo e(url("en/accounting/vouchers/tentantsajax_out")); ?>',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

    });

    $(document).ready(function () {

        $('#details_voucher').click(function () {
            var data_id = $(this).attr("data_id");
            var type = '<?php echo e(\Request::segment(4)); ?>';
            if(type == "received"){
                var url ='<?php echo e(url('en/accounting/reports/received')); ?>';
            }else{
                var url ='<?php echo e(url('en/accounting/reports/expenses')); ?>';
            }

            $.ajax({
                type: 'GET',
                url: url+"/"+data_id,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $.each(data, function(index, element) {
                        console.log(element);
                        $('#num_vocher').empty().append($('<div>', {
                            text: element.number
                        }));
                        $('#name_account').empty().append($('<div>', {
                            text: element.account.name
                        }));
                        $('#amount').empty().append($('<div>', {
                            text: element.paid_amount
                        }));
                        $('#type_pay').empty().append($('<div>', {
                            text: element.paymentable_type == "Fund"  ? "صندوق ": " بنك"
                        }));
                    });
                }
            });
        });






            $('.Name_user_out').select2({
            placeholder: 'Select an item',
            ajax: {
                url: '<?php echo e(url("en/accounting/vouchers/usersajax_out")); ?>',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });



        /*
        *
        * */
        $('#submit_data').click(function () {
            var name_voucher = $('#name_voucher').val();
            var email_voucher = $('#email_voucher').val();
            var mobile_voucher = $('#mobile_voucher').val();
            var voucher_user_type = $('#voucher_user_type').val();
            var agency = $('#agency').val();
            var person = $('#person').val();
            var city = $('#city').val();
            var identityNumber = $('#identityNumber').val();
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(url("en/accounting/vouchers/voucher_out")); ?>",
                method: 'POST',
                data: {
                    name_voucher: name_voucher,
                    email_voucher: email_voucher,
                    city: city,
                    agency: agency,
                    person: person,
                    identityNumber: identityNumber,
                    mobile_voucher: mobile_voucher,
                    voucher_user_type: voucher_user_type,
                    _token: token
                },
                success: function (data) {
                    if(data.success !== undefined){
                        alertify.success(data.success);
                    }else{
                        alertify.error(data.error.errorInfo[2]);
                    }
                }

            });
        });


 /*
        *
        * */
        $('#addaccount').click(function () {
            var codeAccount = $('#codeAccount').val();
            var nameAccount = $('#nameAccount').val();
            var typeAccount = $('#typeAccount').val();
            var debitAccount = $('#debitAccount').val();
            var creditAccount = $('#creditAccount').val();
            var dataMain = $('#dataMain').val();
            var dataMain1 = $('#dataMain1').val();
            var dataMain2 = $('#dataMain2').val();
            var dataSubdivision = $('#dataSubdivision').val();
            var typeMenu = $('#typeMenu').val();
            var typeAccountMenu = $('#typeAccountMenu').val();
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(url("api/accounts/create")); ?>",
                method: 'POST',
                data: {
                    codeAccount: codeAccount,
                    nameAccount: nameAccount,
                    typeAccount: typeAccount,
                    debitAccount: debitAccount,
                    creditAccount: creditAccount,
                    typeMenu: typeMenu,
                    typeAccountMenu: typeAccountMenu,
                    dataMain1: dataMain1,
                    dataMain: dataMain,
                    dataMain2: dataMain2,
                    dataSubdivision: dataSubdivision,
                    _token: token
                },
                success: function (data) {
                    console.log(data.data.code);
                    if(data.status == "success"){
                        // $('#tableBody').append('<tr><td>'+data.data.code+'</td><td></td><td>'+data.data.name+'</td><td>'+data.data.type+'</td><td>'+data.data.balance+'</td><td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">' + 'Remove' + '</button></span></td></tr>');
                        alertify.success("تم بالنجاح إنشاء حساب");
                        location.reload();
                    }else{
                        alertify.error("لم يتم انشاء حساب جديد ");
                    }
                }

            });
        });
/*
        *
        * */
        $('#updateAccount').click(function () {
            var dataId = $(this).attr('data-id');
                // alert(dataId);
            var codeAccount = $('#codeAccount').val();
            var nameAccount = $('#nameAccount').val();
            var typeAccount = $('#typeAccount').val();
            var debitAccount = $('#debitAccount').val();
            var creditAccount = $('#creditAccount').val();
            var dataMain = $('#dataMain').val();
            var dataMain1 = $('#dataMain1').val();
            var dataMain2 = $('#dataMain2').val();
            var dataSubdivision = $('#dataSubdivision').val();
            var typeMenu = $('#typeMenu').val();
            var typeAccountMenu = $('#typeAccountMenu').val();
            var token = '<?php echo e(csrf_token()); ?>';
            $.ajax({
                url: "<?php echo e(url("en/accounting/accounts/updateAccounts")); ?>"+"/"+dataId,
                method: 'POST',
                data: {
                    codeAccount: codeAccount,
                    nameAccount: nameAccount,
                    typeAccount: typeAccount,
                    debitAccount: debitAccount,
                    creditAccount: creditAccount,
                    typeMenu: typeMenu,
                    typeAccountMenu: typeAccountMenu,
                    dataMain1: dataMain1,
                    dataMain: dataMain,
                    dataMain2: dataMain2,
                    dataSubdivision: dataSubdivision,
                    _token: token
                },
                success: function (data) {
                    // console.log(data.data.code);
                    if(data.status == "success"){
                        // $('#tableBody').append('<tr><td>'+data.data.code+'</td><td></td><td>'+data.data.name+'</td><td>'+data.data.type+'</td><td>'+data.data.balance+'</td><td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">' + 'Remove' + '</button></span></td></tr>');
                        alertify.success("تم بالنجاح التعديل حساب");
                        // location.reload();
                        window.location.replace("<?php echo e(url('en/accounting/accounts')); ?>");

                    }else{
                        alertify.error("لم يتم انشاء حساب جديد ");
                    }
                }

            });
        });


        $('#typeAccount').change(function () {
            var typeName = $(this).val();
            // alert(typeName);
            if(typeName == "رئيسى"){
                document.getElementById('dataMains').style.display = 'none';
                document.getElementById('dataMain4').style.display = 'none';
                document.getElementById('dataSubdivision1').style.display = 'none';
                document.getElementById('dataMain3').style.display = 'none';
            }
            if(typeName == "رئيسى1"){
                document.getElementById('dataMain4').style.display = 'none';
                document.getElementById('dataSubdivision1').style.display = 'none';
                document.getElementById('dataMain3').style.display = 'none';
                document.getElementById('dataMains').style.display = 'block';
            }
            if(typeName == "رئيسى2"){
                document.getElementById('dataMain4').style.display = 'block';
                document.getElementById('dataSubdivision1').style.display = 'none';
                document.getElementById('dataMain3').style.display = 'none';
                document.getElementById('dataMains').style.display = 'none';

            }
            if(typeName == "رئيسى3"){
                document.getElementById('dataMain3').style.display = 'block';
                document.getElementById('dataMain4').style.display = 'none';
                document.getElementById('dataSubdivision1').style.display = 'none';
                document.getElementById('dataMains').style.display = 'none';
            }
            if(typeName == "فرعى"){
                document.getElementById('dataSubdivision1').style.display = 'block';
                document.getElementById('dataMain3').style.display = 'none';
                document.getElementById('dataMain4').style.display = 'none';
                document.getElementById('dataMains').style.display = 'none';
            }
            // document.getElementById('app').style.display = 'none';


              });
    });


</script>

<?php echo $__env->yieldContent('scripting...'); ?>

<?php /**PATH /home1/forsama1/public_html/waqf/Modules/Accounting222222/Resources/views/layouts/footer.blade.php ENDPATH**/ ?>