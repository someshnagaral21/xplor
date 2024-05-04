<?php

namespace App\Repositories;

/**
 * Class BaseRepository
 * This class is contains common crud functions
 */
abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * Method to get records.
     *
     * @return mixed
     */
    public function list()
    {
        return $this->model
            ->orderBy('id', 'asc')
            ->paginate(config('config.default_pagination'));
    }

    /**
     * Method to create new record.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Method to update existing record.
     * It will not use 'mass update' via eloquent, so that it will fire eloquent events while updating.
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    /**
     * Method to find record by its primary key.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Method to delete record by its primary key.
     *
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        return $this->model->find($id)->delete();
    }
}
