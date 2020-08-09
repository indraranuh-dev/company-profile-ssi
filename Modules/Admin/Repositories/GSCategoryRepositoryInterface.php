<?php

namespace Modules\Admin\Repositories;

interface GSCategoryRepositoryInterface
{
    /**
     * Get all general supplies from resource
     *
     * @return void
     */
    public function getAll();

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
     *  Add general supplies to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update general supplies to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * delete general supplies to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}