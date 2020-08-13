<?php

namespace Modules\Admin\Repositories;

interface SupplierRepositoryInterface
{
    /**
     * Get all suppliers from resource
     *
     * @param object $request
     * @return object
     */
    public function getAll($request);

    /**
     * Get all suppliers from resource with condition
     * ex ['name', 'daikin'] OR ['name', '!=', 'daikin']
     *
     * @param array $array
     * @return object
     */
    public function getWhere($array);

    /**
     * Find supplier by passing id
     *
     * @param string $id
     * @return object
     */
    public function findById(string $id);

    /**
     * Find supplier by passing slug_name
     *
     * @param string $slug
     * @return object
     */
    public function findBySlug(string $slug);

    /**
     * Find supplier by passing categoryName
     *
     * @param string $categoryName
     * @return void
     */
    public function findByCategory($categoryName);

    /**
     * Add supplier to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * Update from resource
     *
     * @param object $request
     * @param string $id
     * @return void
     */
    public function update($request, string $id);

    /**
     * Destroy supplier from resource
     *
     * @param string $id
     * @return void
     */
    public function delete(string $id);
}