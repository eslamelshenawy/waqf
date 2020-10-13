<select name="job" class="form-control" id="job">
    <option selected disabled>{{ __('admin::globals.select_job') }}</option>
    <option value="government_employee" {{ isset($job) ? ($job == 'government_employee' ? 'selected' : '') : '' }}>{{ __('admin::jobs.government_employee') }}</option>
    <option value="private_sector_employee" {{ isset($job) ? ($job == 'private_sector_employee' ? 'selected' : '') : '' }}>{{ __('admin::jobs.private_sector_employee') }}</option>
    <option value="businessman" {{ isset($job) ? ($job == 'businessman' ? 'selected' : '') : '' }}>{{ __('admin::jobs.businessman') }}</option>
    <option value="free_business" {{ isset($job) ? ($job == 'free_business' ? 'selected' : '') : '' }}>{{ __('admin::jobs.free_business') }}</option>
    <option value="retired" {{ isset($job) ? ($job == 'retired' ? 'selected' : '') : '' }}>{{ __('admin::jobs.retried') }}</option>
    <option value="other" {{ isset($job) ? ($job == 'other' ? 'selected' : '') : '' }}>{{ __('admin::jobs.other') }}</option>
</select>

