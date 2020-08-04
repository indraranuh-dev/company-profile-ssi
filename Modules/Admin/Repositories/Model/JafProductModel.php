<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Repositories\Model\Entities\JafProduct;
use Modules\Admin\Repositories\JafProductRepositoryInterface;
use Modules\Admin\Repositories\Model\Entities\JafProductDetail;

class JafProductModel implements JafProductRepositoryInterface
{

    public function getAll($request)
    {
        $jaf = JafProduct::orderBy('created_at', 'desc')->with('details:id,jaf_id,description', 'category:id,name');
        return $jaf->get();
    }

    public function findById($id)
    {
        $jaf = JafProduct::where('id', $this->decrypt(false, $id))->with('category', 'details');
        return $jaf->first();
    }

    public function findBySlug($slug)
    {
        $jaf = JafProduct::where('slug_name', $slug)->with('details');
        return $jaf->first();
    }

    public function findDetailByForeign($id)
    {
        $detail = JafProductDetail::where('jaf_id', $this->decrypt(false, $id));
        return $detail->get();
    }

    public function create($request)
    {
        $id = Generator::shortUUID();
        $jaf = new JafProduct();
        $jaf->id = $id;
        $jaf->name = $request->name;
        $jaf->slug_name = Str::slug($request->name);
        $jaf->series = $request->series;
        ($request->image)
            ? $this->uploadImage($request, $jaf)
            : false;
        $jaf->save();
        foreach ($request->description as $desc) {
            JafProductDetail::create([
                'jaf_id' => $id,
                'description' => $desc
            ]);
        };
        return $this->sync($request);
    }

    public function createDescription($request)
    {
        $jaf_id = $this->decrypt(false, $request->segment(3));
        $detail = new JafProductDetail();
        $detail->jaf_id = $jaf_id;
        $detail->description = $request->description;
        return $detail->save();
    }

    public function update($request, $id)
    {
        $jaf = JafProduct::findOrFail($this->decrypt(false, $id));
        $jaf->name = $request->name;
        $jaf->slug_name = Str::slug($request->name);
        $jaf->series = $request->series;
        ($request->image)
            ? $this->updateImage($request, $jaf)
            : false;
        $jaf->save();
        return $this->sync($request);
    }

    public function updateDescription($request, $id)
    {
        $detail = JafProductDetail::findOrFail($this->decrypt(false, $id));
        $detail->description = $request->description;
        return $detail->save();
    }

    public function delete($id)
    {
        $jaf = JafProduct::findOrFail($this->decrypt(false, $id));
        return $jaf->delete();
    }

    public function deleteDescription($id)
    {
        $detail = JafProductDetail::findOrFail($this->decrypt(false, $id));
        $detail->delete();
        return $this->deleteImage($detail->image);
    }

    /**
     * Processing image and move to storage
     *
     * @param Illuminate\Http\Request $request
     * @param object $jaf
     * @return void
     */
    protected function uploadImage($request, $jaf)
    {
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/image'), $name);
        return $jaf->image = $name;
    }

    /**
     * Delete the old image and replacing with new image
     *
     * @param Illuminate\Http\Request $request
     * @param object $jaf
     * @return void
     */
    protected function updateImage($request, $jaf)
    {
        $this->deleteImage($jaf->image);
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/image'), $name);
        return $jaf->image = $name;
    }

    /**
     * Delete image from storage
     *
     * @param string $jafImage
     * @return void
     */
    protected function deleteImage($jafImage)
    {
        ($jafImage !== '' || $jafImage !== null)
            ? Storage::disk('image')->delete($jafImage)
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
        $type = JafProduct::where('name', $request->name)->first();
        return $type->category()->sync($this->decrypt(false, $request->category));
    }
}