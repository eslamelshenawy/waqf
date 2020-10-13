
@include('accounting::layouts.partials._copyright')
<script src="{{adminUrl()}}/js/vendor/jquery-3.3.1.min.js"></script>

<script src="{{adminUrl()}}/js/vendor/bootstrap.bundle.min.js"></script>


<script src="{{adminUrl()}}/js/vendor/perfect-scrollbar.min.js"></script>
<script src="{{adminUrl()}}/js/vendor/datatables.min.js"></script>
<script src="{{adminUrl()}}/js/vendor/pickadate/picker.js"></script>
<script src="{{adminUrl()}}/js/vendor/pickadate/picker.date.js"></script>
<script src="{{adminUrl()}}/js/vendor/pickadate/picker.time.js"></script>

<script src="{{adminUrl()}}/js/vendor/echarts.min.js"></script>

<script src="{{adminUrl()}}/js/es5/echart.options.min.js"></script>
<script src="{{adminUrl()}}/js/es5/dashboard.v1.script.min.js"></script>

<script src="{{adminUrl()}}/js/tagging.min.js"></script>
<script src="{{adminUrl()}}/js/invoice.script.js"></script>
<script src="{{adminUrl()}}/js/vendor/tagging.script.js"></script>

<script src="{{adminUrl()}}/js/es5/script.min.js"></script>
<script src="{{adminUrl()}}/js/es5/sidebar.large.script.min.js"></script>



{{--<script src="{{adminUrl()}}/js/dropzone.script.js" defer></script>--}}

{{--<script src="{{adminUrl()}}/js/invoice.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/ladda.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/modal.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/nuslider.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/quill.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/sidebar.compact.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/sidebar.large.script.js" defer></script>--}}
{{--<script src="{{adminUrl()}}/js/sidebar.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/toastr.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/smart.wizard.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/echart.options.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/cropper.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/calendar.script.js"></script>--}}
{{--<script src="{{adminUrl()}}/js/customizer.script.js"></script>--}}



<script src="/vendor/bootstrapv4/js/bootstrap.bundle.js"></script>
<script src="/vendor/bootstrapv4/js/bootstrap.js"></script>

<script src="/js/all.min.js"></script>

<script src="{{ adminUrl() }}/js/datatables.script.js"></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<script src="/js/axios.min.js"></script>

@stack('scripts...')
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
        axios.post('{{ route("Admin::syncing") }}')
            .then((response) => {
                location.reload();
            })
    }

    $(document).ready(function () {
        
        
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
     
        // alert('dsds');
            //   $('.paid_amount').on('change', function () {
            //       alert('dsds');
            //     var paid_amount=$(this).val();
            //     var amount=$('#amount').val();
            //     // alert(Number(paid_amount) > Number(amount));
            //     if(Number(paid_amount) > Number(amount) ){
            //         document.getElementById("paid_amount").value =0;
            //         document.getElementById('danger_number').style.display = 'block';
            //     }else{
            //         document.getElementById('danger_number').style.display = 'none';
            //     }
            // });
        
        $('.Name_user').select2({
            placeholder: 'Select an item',
            ajax: {
                url: '{{url("en/accounting/vouchers/usersajax")}}',
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
                url: '{{url("en/accounting/vouchers/tentantsajax_out")}}',
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

        $('.details_voucher').click(function () {
            var data_id = $(this).attr("data_id");
            var type = '{{\Request::segment(4)}}';
            if(type == "received"){
                var url ='{{url('en/accounting/reports/received')}}';
            }else{
                var url ='{{url('en/accounting/reports/expenses')}}';
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
                url: '{{url("en/accounting/vouchers/usersajax_out")}}',
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
            var type = $('#type').val();
            var identityNumber = $('#identityNumber').val();
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{url("en/accounting/vouchers/voucher_out")}}",
                method: 'POST',
                data: {
                    name_voucher: name_voucher,
                    email_voucher: email_voucher,
                    city: city,
                    type: type,
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
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{url("api/accounts/create")}}",
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
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: "{{url("en/accounting/accounts/updateAccounts")}}"+"/"+dataId,
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
                        window.location.replace("{{url('en/accounting/accounts')}}");

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

@yield('scripting...')

