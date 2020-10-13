<?php

namespace App\Providers;

use App\Repositories\Estate\Reservations\ReservationsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\User\Tenant\TenantRepositoryInterface',
            'App\Repositories\User\Tenant\TenantRepository'
        );

        $this->app->bind(
            'App\Repositories\User\Beneficiary\BeneficiaryRepositoryInterface',
            'App\Repositories\User\Beneficiary\BeneficiaryRepository'
        );
        $this->app->bind(
            'App\Repositories\User\Advance\AdvanceRepositoryInterface',
            'App\Repositories\User\Advance\AdvanceRepository'
        );

        $this->app->bind(
            'App\Repositories\User\Agency\AgencyRepositoryInterface',
            'App\Repositories\User\Agency\AgencyRepository'
        );

        // Starting of real estates

        $this->app->bind(
            'App\Repositories\Estate\Building\BuildingRepositoryInterface',
            'App\Repositories\Estate\Building\BuildingRepository'
        );


        $this->app->bind(
            'App\Repositories\Estate\Reservations\ReservationsRepositoryInterface',
            'App\Repositories\Estate\Reservations\ReservationsRepository'
        );

        $this->app->bind(
            'App\Repositories\Estate\Apartment\ApartmentRepositoryInterface',
            'App\Repositories\Estate\Apartment\ApartmentRepository'
        );

        $this->app->bind(
            'App\Repositories\Estate\Shop\ShopRepositoryInterface',
            'App\Repositories\Estate\Shop\ShopRepository'
        );

        $this->app->bind(
            'App\Repositories\Estate\Land\LandRepositoryInterface',
            'App\Repositories\Estate\Land\LandRepository'
        );

        $this->app->bind(
            'App\Repositories\Estate\EstateRepositoryInterface',
            'App\Repositories\Estate\EstateRepository'
        );

        $this->app->bind(
            'App\Repositories\Order\Estate\EstateOrderInterfaceRepository',
            'App\Repositories\Order\Estate\EstateOrderRepository'
        );

        $this->app->bind(
            'App\Repositories\Order\Maintenance\MaintenanceOrderInterfaceRepository',
            'App\Repositories\Order\Maintenance\MaintenanceOrderRepository'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
