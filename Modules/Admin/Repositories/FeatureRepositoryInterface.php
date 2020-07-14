<?php

namespace Modules\Admin\Repositories;

interface FeatureRepositoryInterface
{
    /**
     * Get all feature from resource
     *
     * @return void
     */
    public function getAll($request);

    /**
     * Find feature by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find feature by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlug($slug);


    /**
     *  Add feature to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update feature to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * delete feature to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}