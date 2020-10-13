@inject("Bank", "\Modules\Accounting\Entities\Bank")
<select id="bankId" class="field form-control" name="bank_id">
    <option disabled selected>{{ __('shared::commons.select_bank') }}</option>
    @foreach($Bank::get() as $bank)
        @if( $bank->id == old('bank_id') )
            <option value="{{ $bank->id }}" selected {{ isset($bank_id) ? ($bank_id == $bank->id ? 'selected' : '') : '' }}>{{ $bank->name }}</option>
        @else
            <option value="{{ $bank->id }}" {{ isset($bank_id) ? ($bank_id == $bank->id ? 'selected' : '') : '' }}>{{ $bank->name }}</option>
        @endif
    @endforeach
</select>
