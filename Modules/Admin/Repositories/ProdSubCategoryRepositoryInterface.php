<?php

namespace Modules\Admin\Repositories;

interface ProdSubCategoryRepositoryInterface
{
    /**
     * Get all product_category from resource
     *
     * @return void
     */
    public function getAll();

    /**
     * Find product_catrgory by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find product_category by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlug($slug);


    /**
     *  Add product_category to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update product_category to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * delete product_category to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}