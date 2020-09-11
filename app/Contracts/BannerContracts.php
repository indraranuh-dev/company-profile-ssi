<?php

namespace App\Contracts;

use Illuminate\Support\Facades\Storage;

trait BannerContracts
{
    /**
     * Processing image and move to storage
     *
     * @param Illuminate\Http\Request $request
     * @param object $collection
     * @return void
     */
    protected function uploadBanner($request)
    {
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/banner'), $name);
        return $name;
    }

    /**
     * Delete the old image and replacing with new image
     *
     * @param Illuminate\Http\Request $request
     * @param object $collection
     * @return void
     */
    protected function updateBanner($request, $collection)
    {
        $this->deleteBanner($collection->image);
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/banner'), $name);
        return $name;
    }

    /**
     * Delete image from storage
     *
     * @param string $imageName
     * @return void
     */
    protected function deleteBanner($imageName)
    {
        ($imageName !== '' || $imageName !== null)
            ? Storage::disk('banner')->delete($imageName)
            : false;
    }
}