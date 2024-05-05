<?php

namespace App\Repositories\Customer;

use Illuminate\Database\Eloquent\Collection;
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

    /**
     * Get total customer count
     *
     * @return integer
     */
    public function getTotalCount(): int;

    /**
     * Get record count with filter
     *
     * @param array $filters
     * @return integer
     */
    public function getRecordCountWithFilter(array $filters): int;

    /**
     * Get paginated records of customers
     *
     * @param array $filters
     * @return Collection
     */
    public function getRecords(array $filters): Collection;
}
