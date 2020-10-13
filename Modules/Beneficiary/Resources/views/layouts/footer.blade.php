
@include('admin::layouts.partials._copyright')
</div>
</div>
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

<script src="/js/axios.min.js"></script>


@stack('scripts...')


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

</script>

@yield('scripting...')

</body>
</html>
