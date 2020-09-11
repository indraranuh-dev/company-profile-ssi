<?php

namespace App\Contracts;

use Illuminate\Support\Facades\Storage;

trait ImageContracts
{
    /**
     * Processing image and move to storage
     *
     * @param Illuminate\Http\Request $request
     * @param object $collection
     * @return void
     */
    protected function uploadImage($request, $collection)
    {
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/image'), $name);
        return $name;
    }

    /**
     * Delete the old image and replacing with new image
     *
     * @param Illuminate\Http\Request $request
     * @param object $collection
     * @return void
     */
    protected function updateImage($request, $collection)
    {
        $this->deleteImage($collection->image);
        $name = time() . '_' . random_int(100, 999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(storage_path('app/public/image'), $name);
        return $name;
    }

    /**
     * Delete image from storage
     *
     * @param string $imageName
     * @return void
     */
    protected function deleteImage($imageName)
    {
        ($imageName !== '' || $imageName !== null)
            ? Storage::disk('image')->delete($imageName)
            : false;
    }
}