<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\{
    Builder,
    Collection
};

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

    /**
     * Get total customer count
     *
     * @return integer
     */
    public function getTotalCount(): int
    {
        $customers = $this->model;

        return $customers->count();
    }

    /**
     * Get record count with filter
     *
     * @param array $filters
     * @return integer
     */
    public function getRecordCountWithFilter(array $filters): int
    {
        $cusomers = $this->applySearchFilter($filters);

        return $cusomers->count();
    }

    /**
     * Apply search filters in the datatable list
     *
     * @param array $filters
     * @return Builder
     */
    private function applySearchFilter(array $filters): Builder
    {
        return $this->model
            ->where(function ($query) use ($filters) {
                $query->where('name', 'LIKE', '%' . $filters['search'] . '%')
                    ->orWhere('email', 'LIKE', '%' . $filters['search'] . '%')
                    ->orWhere('id', 'LIKE', '%' . $filters['search'] . '%');
            });
    }

    /**
     * Get paginated records of customers
     *
     * @param array $filters
     * @return Collection
     */
    public function getRecords(array $filters): Collection
    {
        $customers = $this->applySearchFilter($filters);

        return $customers->orderBy($filters['sort_col'], $filters['sort_order'])
            ->skip($filters['start'])
            ->take($filters['length'])
            ->get();
    }
}
