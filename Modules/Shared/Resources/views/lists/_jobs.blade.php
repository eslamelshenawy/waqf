<select class="form-control" name="job">
    <option selected disabled>{{ __('shared::actions.select') . ' ' . __('shared::commons.jobs') }}</option>
    @for($i=0; $i<count($jobs=include app_path('Constants/jobs.php')); $i++)
        <option value="{{ $jobs[$i][0] }}">{{ $jobs[$i][1][app()->getLocale()] }}</option>
    @endfor
</select>