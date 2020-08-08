<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Repositories\Model\Entities\Product;
use Modules\Admin\Repositories\Model\Entities\Supplier;
use Modules\Admin\Repositories\ProductRepositoryInterface;
use Modules\Admin\Repositories\Model\Entities\ProductSubCategory;
use Modules\Admin\Repositories\Model\Entities\ProductType;
use Modules\Admin\Repositories\Model\Entities\Tag;

class ProductModel implements ProductRepositoryInterface
{
    public function getAll($request)
    {
        $product = Product::orderBy('name', 'asc')->with('suppliers:id,name');
        // if(! empty($request->kategori) && $request->kategori !== 'all'){
        //     $product->whereHas('')
        // }
        return $product->paginate(10);
    }

    public function findById($id)
    {
        $product = Product::where('id', $this->decrypt(false, $id))
            ->with(
                'subCategories:id,name',
                'suppliers:id,name',
                'features:id,name',
                'type:id,name'
            );
        return $product->first();
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

    public function adminFindBySlug($slug)
    {
        $product = Product::where('slug_name', $slug)
            ->with(
                'subCategories:id,name',
                'suppliers:id,name',
                'features.category:id,name',
                'type:id,name',
                'tags:id,name'
            );
        return $product->first();
    }

    public function create($request)
    {
        $product = new Product();
        $product->id = Generator::shortUUID();
        $product->name = $request->name;
        $product->slug_name = Str::slug($request->name);
        $product->series = $request->series;
        $product->description = $request->description;
        $product->inverter = $request->inverter;
        $product->product_type_id = $this->decrypt(false, $request->type);
        $this->uploadImage($request, $product);
        $this->uploadSpesification($request, $product);
        $product->save();
        return $this->sync($request);
    }

    public function update($request, $id)
    {
        $product = Product::findOrFail($this->decrypt(false, $id));
        $product->name = $request->name;
        $product->slug_name = Str::slug($request->name);
        $product->series = $request->series;
        $product->description = $request->description;
        $product->inverter = $request->inverter;
        $product->product_type_id = $this->decrypt(false, $request->type);
        ($request->image)
            ? $this->uploadImage($request, $product)
            : false;
        ($request->spesification)
            ? $this->uploadSpesification($request, $product)
            : false;
        $product->save();
        return $this->sync($request);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($this->decrypt(false, $id));
        return $product->delete();
    }

    protected function decrypt($isArray = false, $id = '', $arr = [])
    {
        if ($isArray === false) {
            return Generator::crypt($id, 'decrypt');
        } else {
            $newArr = [];
            foreach ($arr as $a) {
                array_push($newArr, Generator::crypt($a, 'decrypt'));
            }
            return $newArr;
        }
    }

    protected function sync($request)
    {
        $findSub = Product::where('name', $request->name)->first();
        if ($request->subCategory) $findSub->subCategories()->sync($this->decrypt(false, $request->subCategory));
        if ($request->supplier) $findSub->suppliers()->sync($this->decrypt(false, $request->supplier));
        $findSub->tags()->sync($this->decrypt(true, '', $request->tags));
        if ($request->features) return $findSub->features()->sync($this->decrypt(true, '', $request->features));
    }

    /**
     * Processing image and move to storage
     *
     * @param Illuminate\Http\Request $request
     * @param object $product
     * @return void
     */
    protected function uploadImage($request, $product)
    {
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/image'), $name);
        return $product->product_image = $name;
    }

    /**
     * Delete the old image and replacing with new image
     *
     * @param Illuminate\Http\Request $request
     * @param object $product
     * @return void
     */
    protected function updateImage($request, $product)
    {
        $this->deleteImage($product->image);
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/image'), $name);
        return $product->product_image = $name;
    }

    /**
     * Delete image from storage
     *
     * @param string $productImage
     * @return void
     */
    protected function deleteImage($productImage)
    {
        ($productImage !== '' || $productImage !== null)
            ? Storage::disk('image')->delete($productImage)
            : false;
    }

    /**
     * Processing spesification and move to storage
     *
     * @param Illuminate\Http\Request $request
     * @param object $product
     * @return void
     */
    protected function uploadSpesification($request, $product)
    {
        if ($request->spesification) {
            $name = time() . '_' . random_int(100, 999) . '.' . $request->spesification->getClientOriginalExtension();
            $request->spesification->move(storage_path('app/public/image'), $name);
            return $product->spesification = $name;
        }
    }

    /**
     * Delete the old spesification and replacing with new spesification
     *
     * @param Illuminate\Http\Request $request
     * @param object $product
     * @return void
     */
    protected function updateSpesification($request, $product)
    {
        if ($request->spesification) {
            $this->deleteSpesification($product->spesification);
            $name = time() . '_' . random_int(100, 999) . '.' . $request->spesification->getClientOriginalExtension();
            $request->spesification->move(storage_path('app/public/image'), $name);
            return $product->spesification = $name;
        }
    }

    /**
     * Delete spesification from storage
     *
     * @param string $productSpesification
     * @return void
     */
    protected function deleteSpesification($productSpesification)
    {
        ($productSpesification !== '' || $productSpesification !== null)
            ? Storage::disk('image')->delete($productSpesification)
            : false;
    }
}