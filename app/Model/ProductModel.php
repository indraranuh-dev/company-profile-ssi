<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Repositories\Model\Entities\Tag;
use Modules\Admin\Repositories\Model\Entities\Product;
use Modules\Admin\Repositories\Model\Entities\Supplier;
use Modules\Admin\Repositories\Model\Entities\ProductType;
use Modules\Admin\Repositories\Model\Entities\ProductSubCategory;

class ProductModel
{
    public function getAll()
    {
        $product = Product::orderBy('name', 'asc')->with('suppliers:id,name');
        return $product->paginate(9);
    }

    public function findBySlug($slug)
    {
        $product = Product::where('slug_name', $slug)
            ->with(
                'subCategories:id,name',
                'suppliers:id,name',
                'features.category:id,name',
                'type:id,name',
                'tags:id,name'
            );
        return ($product->limit(1)->get())
            ? $product->limit(1)->get()
            : [];
    }

    public function findBySubCategory($subCategory, $request)
    {
        $products = Product::orderBy('name', 'asc')->with(
            'suppliers',
            'subCategories',
            'tags',
            'type'
        );

        $subCategories = $this->findSubCategory($subCategory);

        if ($subCategories) {
            $products->whereHas('subCategories', function (Builder $query) use ($subCategories) {
                $query->where('subcategories_id', $subCategories->id);
            });
        } else {
            return [];
        }

        return $products->paginate(9);
    }

    public function findBySupplierNSubCategory($supplier, $subCategory, $request)
    {
        $products = Product::orderBy('name', 'asc')->with(
            'suppliers',
            'subCategories',
            'tags',
            'type'
        );

        $subCategories = $this->findSubCategory($subCategory);
        $suppliers = $this->findSupplier($supplier);

        if ($subCategories) {
            $products->whereHas('subCategories', function (Builder $query) use ($subCategories) {
                $query->where('subcategories_id', $subCategories->id);
            });
        } else {
            return [];
        }

        if ($suppliers) {
            $products->whereHas('suppliers', function (Builder $query) use ($suppliers) {
                $query->where('suppliers_id', $suppliers->id);
            });
        } else {
            return [];
        }

        $this->filter($products, $request);

        return $products->paginate(9);
    }

    protected function filter($products, $request)
    {
        $category = $this->findType($request->c);
        $type = $this->findTag($request->t);
        $inverter = $this->findTag($request->i);

        if ($request->c !== 'all' && $request->c && $category) {
            $products->where('product_type_id', $category->id);
        }

        if ($request->t !== 'all' && $request->t && $type) {
            $products->whereHas('tags', function (Builder $query) use ($type) {
                $query->whereRaw("tags_id = $type->id");
            });
        }

        if ($request->i !== 'all' && $request->i && $inverter) {
            $products->whereHas('tags', function (Builder $query) use ($inverter) {
                $query->whereRaw("tags_id = $inverter->id");
            });
        }
    }

    public function getSupplier($slug)
    {
        $supplier = Supplier::orderBy('name', 'asc');
        $subCategory = $this->findSubCategory($slug);
        $supplier->whereHas('subCategories', function (Builder $query) use ($subCategory) {
            $query->whereRaw("subcategories_id = $subCategory->id");
        });
        return $supplier->get();
    }

    protected function findTag($k)
    {
        return Tag::whereRaw('slug_name LIKE "%' . $k . '%"')->orWhereRaw('name LIKE "%' . $k . '%"')->first();
    }

    protected function findType($slug)
    {
        return ProductType::where('slug_name', $slug)->first();
    }

    protected function findSupplier($slug)
    {
        return Supplier::where('slug_name', $slug)->first();
    }

    protected function findSubCategory($slug)
    {
        return ProductSubCategory::where('slug_name', $slug)->first();
    }
}