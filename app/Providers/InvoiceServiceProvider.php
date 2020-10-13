<?php

namespace App\Providers;
use Modules\Accounting\Entities\Invoice;
use App\Observers\InvoiceObserver;
use Illuminate\Support\ServiceProvider;

class InvoiceServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        Invoice::observe(InvoiceObserver::class);
    }
}
