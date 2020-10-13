<!--Blue select-->
<select class="mdb-select md-form colorful-select dropdown-primary" searchable="{{ __('shared::commons.search_here') }}">
    <option selected disabled>{{ __('shared::commons.select', ['title' => $obj['title']]) }}</option>
    @foreach($obj['items'] as $item)
        <option value="{{ $item->id }}">{{ $item->name_en }}</option>
    @endforeach
</select>

<script>
    // Material Select
    $('.mdb-select').materialSelect({
    });
</script>