<!-- Start Users -->
<input list="beneficiaries" name="beneficiary" id="beneficiaryId" class="field form-control" placeholder="Select beneficiary" value="{{ old('beneficiary') }}">
<datalist id="beneficiaries">
    @foreach(App\Beneficiary::all() as $beneficiary)
        <option value="{{ $beneficiary->identity_number }}" {{ old('beneficiary') == $beneficiary->id ? 'selected' : '' }}>{{ $beneficiary->name }}</option>
    @endforeach
</datalist>
<!-- End Users -->
