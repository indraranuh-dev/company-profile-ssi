<?php

namespace Modules\Admin\Repositories;

interface JafProductRepositoryInterface
{
    /**
     * Get all japan air filter from resource
     *
     * @return void
     */
    public function getAll($request);

    /**
     * Find japan air filter by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find japan air filter by passing slug
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
     *  Add japan air filter to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     *  Add japan air filter to resource
     *
     * @param object $request
     * @return void
     */
    public function createDescription($request);

    /**
     * Update japan air filter to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * Update japan air filter to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function updateDescription($request, $id);

    /**
     * delete japan air filter to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);

    /**
     * delete japan air filter to resource
     *
     * @param int $id
     * @return void
     */
    public function deleteDescription($id);
}