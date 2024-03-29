<!-- Start City -->
<input list="cities" name="city" id="city" class="field form-control"
       placeholder="{{ __('shared::commons.city') }}" value="{{ old('city') }}">
<datalist id="cities">
    @foreach(\App\City::all() as $city)
        <option value="{{ $city->name_en }}" {{ old('city') == $city->name_en ? 'selected' : '' }}>{{ $city->{'name' . '_' . app()->getLocale()} }}</option>
    @endforeach
</datalist>
<!-- End City -->
