<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Repositories\Model\ProductCategoryModel;
use Modules\Admin\Repositories\Model\ProductSubCategoryModel;
use Modules\Admin\Repositories\Model\SupplierModel;
use Modules\Admin\Repositories\ProdCatRepositoryInterface;
use Modules\Admin\Repositories\ProdSubCategoryRepositoryInterface;
use Modules\Admin\Repositories\SupplierRepositoryInterface;

class RepositoriesServiceProvider extends ServiceProvider
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
        $this->app->bind(SupplierRepositoryInterface::class, SupplierModel::class);
        $this->app->bind(ProdCatRepositoryInterface::class, ProductCategoryModel::class);
        $this->app->bind(ProdSubCategoryRepositoryInterface::class, ProductSubCategoryModel::class);
    }
}