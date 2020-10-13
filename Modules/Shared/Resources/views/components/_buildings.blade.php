@if(\App\Building::where(['is_active' => true])->count())
    <input list="buildings" name="building" id="building" class="field form-control" />
    @foreach(\App\Building::where(['is_active' => true])->get() as $index => $building)
        <datalist id="buildings">
            <option value="{{ $building->number }}">{{ $building->name }}</option>
        </datalist>
    @endforeach
@else
    <input class="field form-control" placeholder="No Buildings" readonly />
@endif