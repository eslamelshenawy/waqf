<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::include('shared::includes._md_', 'md');
        Blade::include('shared::includes._uploader_', 'uploader');
        Blade::include('shared::includes._date_picker_', 'picker');
        Blade::include('shared::includes._input_', 'input');
        Blade::include('shared::includes._label_', 'label');
        Blade::include('shared::includes._text_area_', 'textarea');
        Blade::include('shared::includes._button_', 'button');
        Blade::include('shared::includes._search_', 'search');
        Blade::include('shared::includes._table_searchable_', 'table');
    }
}
