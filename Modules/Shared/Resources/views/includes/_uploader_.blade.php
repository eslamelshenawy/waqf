<div class="clearfix"></div>
<div class="file-field">
    <div class="btn btn-primary btn-sm float-left">
        <span>@isset($title) {{ $title }} @else 'Upload your image' @endisset</span>
        <input type="file" id="uploader" name="{{ $field }}" {{ isset($multi) ? 'multiple' : '' }}>
    </div>
    <div class="file-path-wrapper">
        <input class="file-path validate" name="{{ $field }}" type="text" style="display: none">
    </div>
</div>
<div class="clearfix"></div>



@section('styling...')
    <style>
        .btn-primary  {
            background-color: #639 !important;
        }
    </style>
@endsection

@section('scripting...')
    <script>
        // document.getElementById('uploader').setAttribute();
    </script>
@endsection