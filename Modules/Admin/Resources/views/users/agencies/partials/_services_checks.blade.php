<div style="display: {{ old('type') === 'agency' ? 'block' : 'none' }};" id="servicesDiv">
    <div class="form-row">
        <div class="col-md-12 mb-3">
            <label class="form-label">{{ __('shared::users.services') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" {{ checkbox('services', 9, 'electric') == true ? 'checked' : '' }}
            value="electric" class="form-check-inline"  />
            <label>&nbsp;{{ __('shared::users.electric') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" {{ checkbox('services', 9, 'plumber') == true ? 'checked' : '' }}
            value="plumber" class="form-check-inline"  />
            <label>&nbsp;{{ __('shared::users.plumber') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" {{ checkbox('services', 9, 'carpenter') == true ? 'checked' : '' }}
            value="carpenter" class="form-check-inline" />
            <label>&nbsp;{{ __('shared::users.carpenter') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" {{ checkbox('services', 9, 'painter') == true ? 'checked' : '' }}
            value="painter" class="form-check-inline"  />
            <label>&nbsp;{{ __('shared::users.painter') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" {{ checkbox('services', 9, 'paving') == true ? 'checked' : '' }}
            value="paving" class="form-check-inline"  />
            <label>&nbsp;{{ __('shared::users.paving') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" {{ checkbox('services', 9, 'transfer_furniture') == true ? 'checked' : '' }}
            value="transfer_furniture" class="form-check-inline"  />
            <label>&nbsp;{{ __('shared::users.transfer_furniture') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" {{ checkbox('services', 9, 'uploading_and_downloading') == true ? 'checked' : '' }}
            value="uploading_and_downloading" class="form-check-inline" />
            <label>&nbsp;{{ __('shared::users.uploading_and_downloading') }}</label>
        </div>
        <div class="col-md-3 mb-1">
            <input type="checkbox" name="services[]" {{ checkbox('services', 9, 'cleaning') == true ? 'checked' : '' }}
            value="cleaning" class="form-check-inline"  />
            <label>&nbsp;{{ __('shared::users.cleaning') }}</label>
        </div>
        <div class="col-md-12 mb-1">
            <input type="checkbox" name="services[]"
                   value="other" {{ checkbox('services', 9, 'other') == true ? 'checked' : '' }}
                   class="form-check-inline"
                   id="otherServiceCheck" onchange="chooseServices(this)" />
            <label>&nbsp;{{ __('shared::commons.other') }}</label>
        </div>
        <div class="col-md-3 mb-1"  style="display: {{ checkbox('services', 9, 'other') == true ? 'block' : 'none' }}" id="otherServicesDiv">
            <input type="text" class="form-check-inline checkbox" name="service_other"
                   value="{{ old('service_other') }}"
                   id="otherServicesInput" placeholder="{{ __('shared::commons.service_other') }}" />
        </div>
    </div>
    <hr>
</div>