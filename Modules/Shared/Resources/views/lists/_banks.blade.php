
<select id="bankId" class="field form-control" name="bank_id">
    <option disabled selected>{{  __('shared::actions.select') . ' ' .  __('shared::commons.banks') }}</option>
@foreach(\Modules\Accounting\Entities\Bank::all() as $bank)
    @if( $bank->id == old('bank_id') )
            <option value="{{ $bank->id }}" selected>{{ $bank->name }}</option>
        @else
            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
        @endif
    @endforeach
</select>
