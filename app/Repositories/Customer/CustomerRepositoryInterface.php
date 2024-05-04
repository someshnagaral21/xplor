<?php

namespace App\Repositories\Customer;

use App\Repositories\BaseRepositoryInterface;

/**
 * Interface CustomerRepositoryInterface
 * Interface for customer repository
 *
 * @package App\Repositories\Customer
 */
interface CustomerRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Method to check whether customer exists or not
     *
     * @param int $id
     * @return bool
     */
    public function isExists(int $id): bool;
}
