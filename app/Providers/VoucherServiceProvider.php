<?php

namespace App\Providers;

use App\Observers\VoucherObserver;
use Illuminate\Support\ServiceProvider;
use Modules\Accounting\Entities\Voucher;

class VoucherServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        Voucher::observe(VoucherObserver::class);
    }
}
