<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Modules\Admin\Repositories\Model\Entities\Product;
use Modules\Admin\Repositories\ProductRepositoryInterface;

class ProductModel implements ProductRepositoryInterface
{
    public function getAll($request)
    {
        $product = Product::orderBy('created_at', 'desc')->with('subCategories');
        // if(! empty($request->kategori) && $request->kategori !== 'all'){
        //     $product->whereHas('')
        // }
        return $product->get();
    }

    public function findById($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    public function findBySlug($slug)
    {
        $product = Product::where('slug_name', $slug);
        return $product->first();
    }

    public function create($request)
    {
        $product = new Product();
        $product->id = Generator::shortUUID();
        $product->name = $request->name;
        $product->slug_name = Str::slug($request->name);
        $product->product_image = $request->product_image;
        $product->description = $request->description;
        $product->spesification = $request->spesification;
        return $product->save();
    }

    public function update($request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug_name = Str::slug($request->name);
        ($request->image !== null)
            ? $product->product_image = $request->product_image
            : false;
        $product->description = $request->description;
        $product->spesification = $request->spesification;
        return $product->save();
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        return $product->delete();
    }
}