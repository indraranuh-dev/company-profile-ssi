<?php

namespace Modules\Admin\Repositories;

interface JafCategoryRepositoryInterface
{
    /**
     * Get all jaf_category from resource
     *
     * @return void
     */
    public function getAll();

    /**
     * Find jaf_category by passing id
     *
     * @param int $id
     * @return void
     */
    public function findById($id);

    /**
     * Find jaf_category by passing slug
     *
     * @param string $slug
     * @return void
     */
    public function findBySlug($slug);


    /**
     *  Add jaf_category to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update jaf_category to resource
     *
     * @param object $request
     * @param int $id
     * @return void
     */
    public function update($request, $id);

    /**
     * delete jaf_category to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}