<?php

namespace Modules\Accounting\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'Modules\Accounting\Repositories\Voucher\VoucherRepositoryInterface',
            'Modules\Accounting\Repositories\Voucher\VoucherRepository'
        );

        $this->app->bind(
            'Modules\Accounting\Repositories\Invoice\InvoiceRepositoryInterface',
            'Modules\Accounting\Repositories\Invoice\InvoiceRepository'
        );

        $this->app->bind(
            'Modules\Accounting\Repositories\Fund\FundRepositoryInterface',
            'Modules\Accounting\Repositories\Fund\FundRepository'
        );
    }


    public function provides()
    {
        return [];
    }
}
