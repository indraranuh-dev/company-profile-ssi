<?php

namespace Modules\Admin\Repositories;

interface FeatureCategoryRepositoryInterface
{
    /**
     * Get all feature_category from resource
     *
     * @return void
     */
    public function getAll();

    /**
     * Find feature_category by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find feature_category by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlug($slug);


    /**
     *  Add feature_category to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update feature_category to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * delete feature_category to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}