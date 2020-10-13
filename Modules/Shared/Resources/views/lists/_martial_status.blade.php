@for($i=0; $i<count($status=include app_path('Constants/marital_status.php')); $i++)
<div class="form-check">
    <input
            onchange="func(this.value)"
            class="form-check-input"
            type="radio"
            name="marital_status"
            value="{{ $status[$i][0] }}"
            {{ $status[$i][0] == 'single' ? 'checked' : '' }}
    />
    <label class="form-check-label" for="{{ $status[$i][0] . 'Status' }}">
        {{ $status[$i][1][app()->getLocale()] }}
    </label>
</div>
@endfor