<?php

namespace Modules\Admin\Repositories;

interface TagRepositoryInterface
{
    /**
     * Get all tag from resource
     *
     * @return void
     */
    public function getAll();

    /**
     * Find tag by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find tag by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlug($slug);


    /**
     *  Add tag to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update tag to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * delete tag to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}