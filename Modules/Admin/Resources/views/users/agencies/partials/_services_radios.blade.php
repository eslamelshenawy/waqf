<div style="display: {{ old('type') === 'person' ? 'block' : 'none' }};" id="serviceDiv">
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label>{{ __('shared::users.service') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="electric"
                   {{ old('services') == 'electric' ? 'checked' : '' }}
                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;{{ __('shared::users.electric') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="plumber"
                   {{ old('services') == 'plumber' ? 'checked' : '' }}
                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;{{ __('shared::users.plumber') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]"
                   value="carpenter" {{ old('services') == 'carpenter' ? 'checked' : '' }}
                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;{{ __('shared::users.carpenter') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="painter"
                   {{ old('services') == 'painter' ? 'checked' : '' }}
                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;{{ __('shared::users.painter') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="paving"
                   {{ old('services') == 'paving' ? 'checked' : '' }}
                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;{{ __('shared::users.paving') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="transfer_furniture" {{ old('services') == 'transfer_furniture' ? 'checked' : '' }}
            class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;{{ __('shared::users.transfer_furniture') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="uploading_and_downloading"
                   {{ old('services') == 'uploading_and_downloading' ? 'checked' : '' }}
                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;{{ __('shared::users.uploading_and_downloading') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="radio" name="services[]" value="cleaning"
                   {{ old('services') == 'cleaning' ? 'checked' : '' }}
                   class="form-check-inline" onchange="chooseService(this)" />
            <label>&nbsp;{{ __('shared::users.cleaning') }}</label>
        </div>
        <div class="col-md-12 mb-1">
            <input type="radio" name="services[]" value="other"
                   class="form-check-inline"
                   id="otherServiceRadio" onchange="chooseService(this)" />
            <label>&nbsp;{{ __('shared::commons.other') }}</label>
        </div><br>
        <div class="col-md-3 mb-1" style="display: none" id="otherServiceDiv">
            <input type="text" name="service_other" value="{{ old('service_other') }}"
                   class="form-control"
                   id="otherServiceInput" placeholder="{{ __('shared::commons.service_other') }}" />
        </div>

    </div>

    <hr>
</div>