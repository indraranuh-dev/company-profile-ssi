<?php

namespace Modules\Admin\Repositories;

interface BannerRepositoryInterface
{
    /**
     * Get all banner from resource
     *
     * @return void
     */
    public function getAll();

    /**
     *  Add banner to resource
     *
     * @param object $request
     * @return void
     */
    public function create($request);

    /**
     * delete banner to resource
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}