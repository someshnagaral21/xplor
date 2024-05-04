<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use App\Repositories\BaseRepository;

/**
 * Class CustomerRepository
 * Customer Repository class
 *
 * @package App\Repositories\Customer
 */
class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    /**
     * Load the model using property promotion
     *
     * @param User $model
     */
    public function __construct(protected Customer $model)
    {
    }

    /**
     * Method to check whether customer exists or not
     *
     * @param int $id
     * @return bool
     */
    public function isExists(int $id): bool
    {
        return $this->model->where('id', $id)->exists();
    }
}
