@inject('estates', "\App\Estate")
@if($estates->count() > 0)
<select name="building" class="form-control" id="building">
    <option selected disabled>{{ __('shared::estates.select_building') }}</option>
    @foreach($estates->where(['estate_type' => 'building', 'is_active' => true])->get() as $building)
        <option value="{{ $building->id }}"
                {{ old('$building_id') == $building->id || (isset($selected_id) && $selected_id == $building->id) ? 'selected' : '' }}>{{ $building->name }}</option>
    @endforeach
</select>
@else
    <input class="form-control mb-2" disabled placeholder="{{ __('shared::messages.no_building_available') }}">
    <i class="fas fa-plus-circle" style="color: #639"></i>&nbsp;
    <a href="{{ route('Admin::buildings.create') }}" style="color: #639;">{{ __('shared::estates.add_building') }}</a>
@endif