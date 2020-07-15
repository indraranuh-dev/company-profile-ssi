<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Repositories\FeatureCategoryRepositoryInterface;
use Modules\Admin\Repositories\FeatureRepositoryInterface;
use Modules\Admin\Repositories\Model\FeatureCategoryModel;
use Modules\Admin\Repositories\Model\FeatureModel;
use Modules\Admin\Repositories\Model\ProductModel;
use Modules\Admin\Repositories\Model\SupplierModel;
use Modules\Admin\Repositories\Model\ProductTypeModel;
use Modules\Admin\Repositories\Model\ProductCategoryModel;
use Modules\Admin\Repositories\ProdCatRepositoryInterface;
use Modules\Admin\Repositories\ProductRepositoryInterface;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface;
use Modules\Admin\Repositories\SupplierRepositoryInterface;
use Modules\Admin\Repositories\Model\ProductSubCategoryModel;
use Modules\Admin\Repositories\Model\ProductSubTypeModel;
use Modules\Admin\Repositories\ProdSubCategoryRepositoryInterface;
use Modules\Admin\Repositories\ProdSubTypeRepositoryInterface;

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
        $this->app->bind(ProductRepositoryInterface::class, ProductModel::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierModel::class);
        $this->app->bind(ProdCatRepositoryInterface::class, ProductCategoryModel::class);
        $this->app->bind(ProdSubCategoryRepositoryInterface::class, ProductSubCategoryModel::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductModel::class);
        $this->app->bind(ProdTypeRepositoryInterface::class, ProductTypeModel::class);
        $this->app->bind(ProdSubTypeRepositoryInterface::class, ProductSubTypeModel::class);
        $this->app->bind(FeatureCategoryRepositoryInterface::class, FeatureCategoryModel::class);
        $this->app->bind(FeatureRepositoryInterface::class, FeatureModel::class);
    }
}