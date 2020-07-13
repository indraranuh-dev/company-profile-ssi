<?php

namespace Modules\Admin\Repositories;

interface ProdTypeRepositoryInterface
{
    /**
     * Get all product_type from resource
     *
     * @return void
     */
    public function getAll();

    /**
     * Find product_type by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find product_type by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlug($slug);


    /**
     *  Add product_type to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update product_type to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * delete product_type to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}