<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Repositories\Model\TagModel;
use Modules\Admin\Repositories\Model\FeatureModel;
use Modules\Admin\Repositories\Model\ProductModel;
use Modules\Admin\Repositories\Model\SupplierModel;
use Modules\Admin\Repositories\Model\JafProductModel;
use Modules\Admin\Repositories\Model\JafCategoryModel;
use Modules\Admin\Repositories\Model\ProductTypeModel;
use Modules\Admin\Repositories\TagRepositoryInterface;
use Modules\Admin\Repositories\Model\ProductSubTypeModel;
use Modules\Admin\Repositories\FeatureRepositoryInterface;
use Modules\Admin\Repositories\Model\FeatureCategoryModel;
use Modules\Admin\Repositories\Model\ProductCategoryModel;
use Modules\Admin\Repositories\ProdCatRepositoryInterface;
use Modules\Admin\Repositories\ProductRepositoryInterface;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface;
use Modules\Admin\Repositories\SupplierRepositoryInterface;
use Modules\Admin\Repositories\GSCategoryRepositoryInterface;
use Modules\Admin\Repositories\JafProductRepositoryInterface;
use Modules\Admin\Repositories\Model\ProductSubCategoryModel;
use Modules\Admin\Repositories\JafCategoryRepositoryInterface;
use Modules\Admin\Repositories\ProdSubTypeRepositoryInterface;
use Modules\Admin\Repositories\FeatureCategoryRepositoryInterface;
use Modules\Admin\Repositories\GeneralSuppliesRepositoryInterface;
use Modules\Admin\Repositories\Model\GeneralSuppliesCategoryModel;
use Modules\Admin\Repositories\Model\GeneralSuppliesModel;
use Modules\Admin\Repositories\ProdSubCategoryRepositoryInterface;

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
        $this->app->bind(TagRepositoryInterface::class, TagModel::class);
        $this->app->bind(JafCategoryRepositoryInterface::class, JafCategoryModel::class);
        $this->app->bind(JafProductRepositoryInterface::class, JafProductModel::class);
        $this->app->bind(GSCategoryRepositoryInterface::class, GeneralSuppliesCategoryModel::class);
        $this->app->bind(GeneralSuppliesRepositoryInterface::class, GeneralSuppliesModel::class);
    }
}