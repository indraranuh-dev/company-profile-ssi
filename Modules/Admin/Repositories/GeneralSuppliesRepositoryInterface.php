<?php

namespace Modules\Admin\Repositories;

interface GeneralSuppliesRepositoryInterface
{
    /**
     * Get all general supplies from resource
     *
     * @return void
     */
    public function getAll($request);

    /**
     * Find general supplies by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find general supplies by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlug($slug);

    /**
     * Find jaf description by passing foreign id in child table
     *
     * @param string $id
     * @return void
     */
    public function findDetailByForeign($id);

    /**
     *  Add general supplies to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     *  Add general supplies to resource
     *
     * @param object $request
     * @return void
     */
    public function createDescription($request);

    /**
     *  Add general supplies to resource
     *
     * @param object $request
     * @return void
     */
    public function createProductImage($request);

    /**
     * Update general supplies to resource
     *
     * @param object $request
     * @param string $slug
     * @return void
     */
    public function update($request, $slug);

    /**
     * Update general supplies to resource
     *
     * @param object $request
     * @param string $slug
     * @return void
     */
    public function updateDescription($request, $slug);

    /**
     * Update general supplies to resource
     *
     * @param object $request
     * @param string $slug
     * @return void
     */
    public function updateProductImage($request, $slug);

    /**
     * delete general supplies to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);

    /**
     * delete general supplies to resource
     *
     * @param int $id
     * @return void
     */
    public function deleteDescription($id);

    /**
     * delete general supplies to resource
     *
     * @param int $id
     * @return void
     */
    public function deleteProductImage($id);
}