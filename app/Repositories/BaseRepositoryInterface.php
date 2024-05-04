<?php

namespace App\Repositories;

/**
 * Interface Base Repository
 */
interface BaseRepositoryInterface
{
    /**
     * Method to get records.
     *
     * @return mixed
     */
    public function list();

    /**
     * Method to create new record.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Method to update existing record.
     * It will not use 'mass update' via eloquent, so that it will fire eloquent events while updating.
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Method to find record by its primary key.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Method to delete record by its primary key.
     *
     * @param $id
     * @return bool
     */
    public function delete($id): bool;
}
