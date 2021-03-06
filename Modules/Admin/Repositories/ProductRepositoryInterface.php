<?php

namespace Modules\Admin\Repositories;

interface ProductRepositoryInterface
{
    /**
     * Get all product from resource
     *
     * @param object $request
     * @return array
     */
    public function getAll($request);

    /**
     * Find product by passing id
     *
     * @param string $id
     * @return object
     */
    public function findById($id);

    /**
     * find product by passing slug_name
     *
     * @param string $slug
     * @return object
     */
    public function findBySlug($slug);

    /**
     * find product by passing slug_name
     *
     * @param string $slug
     * @return object
     */
    public function adminFindBySlug($slug);

    /**
     * Store new product to resource
     *
     * @param Illuminate\Http\Request $request
     * @return void
     */
    public function create($request);

    /**
     * Update exist product from resource
     *
     * @param Illuminate\Http\Request $request
     * @param string $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Delete product from resource
     *
     * @param string $id
     * @return void
     */
    public function delete($id);
}