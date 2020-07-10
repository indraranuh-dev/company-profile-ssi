<?php

namespace Modules\Admin\Transformers;

use App\Utilities\Generator;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSubCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        // $this->categories(function ($category) {
        //     return $category->name
        // });
        return [
            'id' => Generator::crypt($this->id, 'encrypt'),
            'name' => $this->name
        ];
    }
}