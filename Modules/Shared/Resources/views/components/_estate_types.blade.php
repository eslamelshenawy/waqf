<div class="col-md-4 col-sm-6">
    <div class="radio-form">
        <label class="radio-form-container">سكني
            <input type="checkbox" name='building_type[]' checked="checked"  value="residential">
            <span class="checkmark"></span>
        </label>
        <label class="radio-form-container">تجاري
            <input type="checkbox" name='building_type[]' value="commercial">
            <span class="checkmark"></span>
        </label>

        @error('building_type')
        <span>
            {{ $message }}
        </span>
        @enderror
    </div>
</div>