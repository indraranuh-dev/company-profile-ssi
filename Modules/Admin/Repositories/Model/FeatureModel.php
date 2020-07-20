<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Repositories\Model\Entities\Feature;
use Modules\Admin\Repositories\FeatureRepositoryInterface;
use Modules\Admin\Repositories\Model\Entities\FeatureCategory;

class FeatureModel implements FeatureRepositoryInterface
{
    public function getAll($request)
    {
        $feature = Feature::orderBy('created_at', 'desc')->with('category:id,name');
        $category = $this->findCategory($request->kategori);

        if (!empty($request->kategori) && $request->kategori !== 'all') {
            if ($category->get()->isEmpty()) return [];

            $feature->whereHas('category', function (Builder $query) use ($category) {
                $query->where('feature_category_id', $category->first()->id);
            });
        }

        return $feature->paginate(10);
    }

    public function findById($id)
    {
        $feature = Feature::findOrfail($this->decrypt(false, $id));
        return $feature;
    }

    public function findBySlug($slug)
    {
        $feature = Feature::where('slug_name', $slug);
        return $feature->first();
    }

    public function create($request)
    {
        $feature = new Feature();
        $feature->name = $request->name;
        $feature->slug_name = Str::slug($request->name);
        $feature->description = $request->description;
        $feature->feature_category_id = $this->decrypt(false, $request->category);
        $this->uploadIcon($request, $feature);
        return $feature->save();
    }

    public function update($request, $id)
    {
        $feature = Feature::findOrFail($this->decrypt(false, $id));
        $feature->name = $request->name;
        $feature->slug_name = Str::slug($request->name);
        $feature->description = $request->description;
        $feature->feature_category_id = $this->decrypt(false, $request->category);
        ($request->icon)
            ? $this->updateIcon($request, $feature)
            : false;
        return $feature->save();
    }

    public function delete($id)
    {
        $feature = Feature::findOrFail($this->decrypt(false, $id));
        $this->deleteIcon($feature->icon);
        return $feature->delete();
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

    protected function findCategory($category)
    {
        return FeatureCategory::where('slug_name', $category);
    }

    /**
     * Processing icon and move to storage
     *
     * @param Illuminate\Http\Request $request
     * @param object $feature
     * @return void
     */
    protected function uploadIcon($request, $feature)
    {
        $name = time() . '_' . random_int(100, 999) . '.' . $request->icon->getClientOriginalExtension();
        $request->icon->move(storage_path('app/public/icon'), $name);
        return $feature->icon = $name;
    }

    /**
     * Delete the old icon and replacing with new icon
     *
     * @param Illuminate\Http\Request $request
     * @param object $feature
     * @return void
     */
    protected function updateIcon($request, $feature)
    {
        $this->deleteIcon($feature->icon);
        $name = time() . '_' . random_int(100, 999) . '.' . $request->icon->getClientOriginalExtension();
        $request->icon->move(storage_path('app/public/icon'), $name);
        return $feature->icon = $name;
    }

    /**
     * Delete icon from storage
     *
     * @param string $featureIcon
     * @return void
     */
    protected function deleteIcon($featureIcon)
    {
        ($featureIcon !== '' || $featureIcon !== null)
            ? Storage::disk('icon')->delete($featureIcon)
            : false;
    }
}