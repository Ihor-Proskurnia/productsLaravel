<?php

namespace App\Http\Repositories;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
interface BaseRepositoryInterface
{
    /**
     * Get all records
     *
     * @return mixed
     */
    public function all();

    /**
     * Create a record
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create($data);

    /**
     * Delete a record
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * Find a single record
     *
     * @param $id
     *
     * @return mixed
     */
    public function show($id);

    /**
     * Update a record
     *
     * @param $data
     * @param $id
     *
     * @return mixed
     */
    public function update($data, $id);
}
