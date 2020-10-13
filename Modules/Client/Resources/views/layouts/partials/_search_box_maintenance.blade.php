<section class="search__box">
    <div class="container">
        <form action="{{ route('search') }}" method="GET">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <div class="form-group select-form form-box--big">
                        <select name="service" onchange="this.form.submit()">
{{--                            <option selected disabled>{{ __('shared::commons.services.choose') }}</option>--}}
                            <option value="all" {{ old('service') == 'all' ? 'selected' : '' }}>{{ __('shared::commons.all') }}</option>
                            <option value="electric" {{ old('service') == 'electric' ? 'selected' : '' }}>{{ __('shared::commons.services.electric') }}</option>
                            <option value="carpenter" {{ old('service') == 'carpenter' ? 'selected' : '' }}>{{ __('shared::commons.services.carpenter') }}</option>
                            <option value="uploading_and_downloading" {{ old('service') == 'uploading_and_downloading' ? 'selected' : '' }}>{{ __('shared::commons.services.uploading_and_downloading') }}</option>
                            <option value="transfer_furniture" {{ old('service') == 'transfer_furniture' ? 'selected' : '' }}>{{ __('shared::commons.services.transfer_furniture') }}</option>
                            <option value="paving" {{ old('service') == 'paving' ? 'selected' : '' }}>{{ __('shared::commons.services.paving') }}</option>
                            <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>{{ __('shared::commons.services.other') }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <div class="form-group form-box--big">
                        <input type="hidden" name="_" value="x90132" />
                        <input type="search" placeholder="ابحث عن" name="q" value="{{ old('q') }}">
                        <button type="submit">بحث</button>
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>