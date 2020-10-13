<div style="display: {{ old('type') === 'person' ? 'block' : 'none' }};" id="serviceDiv">
    <div class="form-row">

        <div class="col-md-12 mb-3">
            <label class="badge form-label">{{ __('client::users.services.service') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="electric" {{ old('services') == 'electric' ? 'checked' : '' }} class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label>{{ __('client::users.services.electric') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="plumber" {{ old('services') == 'plumber' ? 'checked' : '' }} class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label>{{ __('client::users.services.plumber') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="carpenter" {{ old('services') == 'carpenter' ? 'checked' : '' }} class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label>{{ __('client::users.services.carpenter') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="painter" {{ old('services') == 'painter' ? 'checked' : '' }} class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label>{{ __('client::users.services.painter') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="paving" {{ old('services') == 'paving' ? 'checked' : '' }} class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label>{{ __('client::users.services.paving') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="transfer_furniture" {{ old('services') == 'transfer_furniture' ? 'checked' : '' }} class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label>{{ __('client::users.services.transfer_furniture') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="uploading_and_downloading" {{ old('services') == 'uploading_and_downloading' ? 'checked' : '' }} class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label>{{ __('client::users.services.uploading_and_downloading') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="cleaning" {{ old('services') == 'cleaning' ? 'checked' : '' }} class="form-check-inline radio radio-dark shadow-sm" onchange="chooseService(this)" />
            <label>{{ __('client::users.services.cleaning') }}</label>
        </div>
        <div class="col-md-12 mb-1">
            <input type="radio" name="services[]" value="other"
                    class="form-check-inline radio radio-dark shadow-sm"
                    id="otherServiceRadio" onchange="chooseService(this)" />
            <label>{{ __('client::users.other') }}</label>
        </div><br>
        <div class="col-md-3 mb-1" style="display: none" id="otherServiceDiv">
            <input type="text" name="service_other" value="{{ old('service_other') }}" class="form-control shadow-sm"
                    id="otherServiceInput" placeholder="Other service" />
        </div>

    </div>

    <hr>
</div>