<div id="_image_uploader">

    <div class="form-row">
        <div class="col-md-6 mb-3 mt-3">
            <div class="custom-file">
                <label class="custom-file-label" for="instrumentImage">{{ __('shared::estates.instruments.image') }}</label>
                <input type="file" class="custom-file-input" id="instrumentImage" name="instrument_image">
            </div>

            @error('instrument_image')
            <div>
                <span class="badge badge-danger">{{ $message }}</span>
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="custom-file">
                <label class="custom-file-label" for="buildingLicenseImage">{{ __('shared::estates.buildings.fields.license_image') }}</label>
                <input type="file" class="custom-file-input" id="buildingLicenseImage" name="building_license_image" value="demo">
            </div>

            @error('building_license_image')
            <div>
                <span class="badge badge-danger">{{ $message }}</span>
            </div>
            @enderror
        </div>
    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="custom-file">
                <label class="custom-file-label" for="buildingImage">{{ __('shared::estates.buildings.fields.image') }}</label>
                <input type="file" class="custom-file-input" id="buildingImage" name="building_image" />
            </div>

            @error('building_image')
            <div>
                <span class="badge badge-danger">{{ $message }}</span>
            </div>
            @enderror
        </div>
    </div>

</div>