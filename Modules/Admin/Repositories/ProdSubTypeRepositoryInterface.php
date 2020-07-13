<?php

namespace Modules\Admin\Repositories;

interface ProdSubTypeRepositoryInterface
{
    /**
     * Get all product_subtype from resource
     *
     * @return void
     */
    public function getAll();

    /**
     * Find product_subtype by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find product_subtype by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlug($slug);


    /**
     *  Add product_subtype to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update product_subtype to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * delete product_subtype to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}