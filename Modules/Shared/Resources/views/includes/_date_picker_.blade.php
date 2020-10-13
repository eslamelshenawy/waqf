<div class="md-form">
    <input placeholder="Selected date" type="text" name="{{ $field }}" id="date-picker-example" class="form-control datepicker">
<label for="date-picker-example">{{ $title }}</label>
</div>


@section('scripting...')
    <script>
        $('.datepicker').pickadate();
    </script>
@endsection