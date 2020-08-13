<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\SearchModel;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    private $search;

    /**
     * Class constructor.
     */
    public function __construct(
        SearchModel $searchModel
    ) {
        $this->search = $searchModel;
    }

    public function getProduct(Request $request)
    {
        $hvac = $this->search->searchProduct($request->k);
        $jafs = $this->search->searchJaf($request->k);
        $all = [];
        if ($request->k && !empty($request->k)) {

            // Process HVAC data
            foreach ($hvac as $hvac) {
                $tags = [];
                foreach ($hvac->tags as $tag) {

                    // Check similar characters form resource
                    if (stristr($tag->name, $request->k)) {
                        array_push($tags, $tag->name);
                    }
                }

                // Check if $tags not null
                if (array_count_values($tags) !== []) {
                    $x = ': ';
                } else {
                    $x = '';
                }

                // add data to array All
                array_push($all, [
                    'suggestion' => $hvac->name . $x . implode(', ', $tags),
                    'link' => $this->productLink($hvac->slug_name, 'hvac', $hvac->subCategories[0]->slug_name, $hvac->suppliers[0]->slug_name)
                ]);
            }

            // Process FILTRATION data
            foreach ($jafs as $jaf) {
                $tags = [];
                foreach ($jaf->tags as $tag) {

                    // Check similar characters form resource
                    if (stristr($tag->name, $request->k)) {
                        array_push($tags, $tag->name);
                    }
                }

                // Check if $tags not null
                if (array_count_values($tags) !== []) {
                    $x = ': ';
                } else {
                    $x = '';
                }

                // add data to array All
                array_push($all, [
                    'suggestion' => $jaf->name . $x . implode(', ', $tags),
                    'link' => $this->productLink($jaf->slug_name, 'filtration', '', 'japan-air-filter')
                ]);
            }
        }
        return response()->json(['data' => $all], 200);
    }

    /**
     * Generate product link
     *
     * @param string $slug_name
     * @param string $productCategory
     * @param string $productSubCategory
     * @param string $productVendor
     * @return void
     */
    public function productLink($slug_name, $productCategory = '', $productSubCategory = '', $productVendor = '')
    {
        switch ($productCategory) {
            case 'hvac':
                return route('product.hvac.show', [$productSubCategory, $productVendor, $slug_name]);
                break;
            case 'filtration':
                return route('product.filtration.show', [$productVendor, $slug_name]);
                break;

            default:
                return '';
                break;
        }
    }
}