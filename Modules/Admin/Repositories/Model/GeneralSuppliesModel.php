<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Repositories\Model\Entities\GeneralSupplies;
use Modules\Admin\Repositories\GeneralSuppliesRepositoryInterface;
use Modules\Admin\Repositories\Model\Entities\GeneralSuppliesDetail;
use Modules\Admin\Repositories\Model\Entities\GeneralSuppliesImage;

class GeneralSuppliesModel implements GeneralSuppliesRepositoryInterface
{
    public function getAll($request)
    {
        $gs = GeneralSupplies::orderBy('created_at', 'desc')->with('category');
        return $gs->get();
    }

    public function findById($id)
    {
        $gs = GeneralSupplies::findOrFail($this->decrypt(false, $id))
            ->with('category:id,name', 'tags:id,name', 'details', 'images');
        return $gs->first();
    }

    public function findBySlug($slug)
    {
        $gs = GeneralSupplies::where('slug_name', $slug)
            ->with('category:id,name', 'tags:id,name', 'details', 'images');
        return $gs->first();
    }

    public function findDetailByForeign($id)
    {
    }

    public function create($request)
    {
        $id = Generator::shortUUID();
        $gs = new GeneralSupplies();
        $gs->id = $id;
        $gs->name = $request->name;
        $gs->slug_name = Str::slug($request->name);
        $gs->series = $request->series;
        $gs->gs_category_id = $this->decrypt(false, $request->category);
        $gs->save();

        if ($request->image) {
            foreach ($request->image as $i => $image) {
                $name = time() . '_' . random_int(100, 999) . '.' . $request->image[$i]->getClientOriginalExtension();
                $request->image[$i]->move(storage_path('app/public/image'), $name);
                GeneralSuppliesImage::create([
                    'general_supplies_id' => $id,
                    'image' => $name
                ]);
            }
        }

        if ($request->description) {
            foreach ($request->description as $description) {
                GeneralSuppliesDetail::create([
                    'general_supplies_id' => $id,
                    'description' => $description
                ]);
            }
        }

        return $this->sync($request);
    }

    public function createDescription($request)
    {
        $desc = new GeneralSuppliesDetail();
        $desc->general_supplies_id = $this->decrypt(false, request()->segment(3));
        $desc->description = $request->description;
        return $desc->save();
    }

    public function createProductImage($request)
    {
        $image = new GeneralSuppliesImage();
        $image->general_supplies_id = $this->decrypt(false, request()->segment(3));
        if ($request->image) {
            $this->uploadImage($request, $image);
        }
        return $image->save();
    }

    public function update($request, $id)
    {
        $gs = GeneralSupplies::findOrFail($this->decrypt(false, $id));
        $gs->name = $request->name;
        $gs->slug_name = Str::slug($request->name);
        $gs->series = $request->series;
        $gs->gs_category_id = $this->decrypt(false, $request->category);
        $gs->save();
        return $this->sync($request);
    }

    public function updateDescription($request, $id)
    {
        $detail = GeneralSuppliesDetail::findOrFail($this->decrypt(false, $id));
        $detail->description = $request->description;
        return $detail->save();
    }

    public function updateProductImage($request, $id)
    {
        $image = GeneralSuppliesImage::findOrFail($this->decrypt(false, $id));
        if ($request->image) {
            $this->updateImage($request, $image);
        }
        return $image->save();
    }

    public function delete($id)
    {
        $gs = GeneralSupplies::findOrFail($this->decrypt(false, $id));
        foreach ($gs->images as $img) {
            $this->deleteImage($img->image);
        }
        return $gs->delete();
    }

    public function deleteDescription($id)
    {
        $gs = GeneralSuppliesDetail::findOrFail($this->decrypt(false, $id));
        return $gs->delete();
    }

    public function deleteproductImage($id)
    {
        $gs = GeneralSuppliesImage::findOrFail($this->decrypt(false, $id));
        $this->deleteImage($gs->image);
        return $gs->delete();
    }

    /**
     * Processing image and move to storage
     *
     * @param Illuminate\Http\Request $request
     * @param object $gs
     * @return void
     */
    protected function uploadImage($request, $gs)
    {
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/image'), $name);
        return $gs->image = $name;
    }

    /**
     * Delete the old image and replacing with new image
     *
     * @param Illuminate\Http\Request $request
     * @param object $gs
     * @return void
     */
    protected function updateImage($request, $gs)
    {
        $this->deleteImage($gs->image);
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/image'), $name);
    }

    /**
     * Delete image from storage
     *
     * @param string $gsImage
     * @return void
     */
    protected function deleteImage($gsImage)
    {
        ($gsImage !== '' || $gsImage !== null)
            ? Storage::disk('image')->delete($gsImage)
            : false;
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
        $gs = GeneralSupplies::where('name', $request->name)->first();
        if ($request->tags) return $gs->tags()->sync($this->decrypt(true, '', $request->tags));
    }
}