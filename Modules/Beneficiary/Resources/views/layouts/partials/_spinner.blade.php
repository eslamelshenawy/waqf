<div class="table-responsive" id="spinner" style="display: none">
    <center>
        <div class="loader-bubble loader-bubble-primary m-5" style="font-size: 10px;"></div>
    </center>
</div>


<script>
    window.onload = async function () {

        let loading = setTimeout(function (e) {
            document.getElementById('tableSpinner').style.display = 'none';
            document.getElementById('spinner').style.display = 'block';
            document.getElementById('spinner').style.height = '300px';
        });

        await setTimeout(function (e) {
            clearTimeout(loading);
            document.getElementById('tableSpinner').style.display = 'block';
            document.getElementById('spinner').remove();
        }, 1000);

    };
</script>
