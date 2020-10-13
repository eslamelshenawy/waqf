<section class="breadcrumbs">
    <div class="container">
        <ul class="breadcrumbs_ulists">
            <li class="breadcrumbs_list">
                <a href="{{ $base_path ?? '' }}">Main</a>
            </li>
            <li class="breadcrumbs_list">
                <a href="{{ $current_path ?? '' }}">{{ session()->has('current_page') ? session()->get('current_page') : '' }}</a>
            </li>
        </ul>
    </div>
</section>