<?php

namespace Modules\Admin\Repositories;

interface ProdSubCategoryRepositoryInterface
{
    /**
     * Get all product_subcategory from resource
     *
     * @return void
     */
    public function getAll();

    /**
     * Find product_subcategory by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find product_subcategory by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlug($slug);


    /**
     *  Add product_subcategory to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update product_subcategory to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * delete product_subcategory to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}