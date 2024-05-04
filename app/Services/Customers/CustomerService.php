<?php

namespace App\Services\Customers;

use Illuminate\Validation\ValidationException;
use App\Repositories\Customer\CustomerRepositoryInterface;

/**
 * Class CustomerService
 * Customer Service class for Customer management functions
 *
 * @package App\Services\Customers
*/
class CustomerService
{
    /**
     * Load repositories using property promotion
     *
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        private CustomerRepositoryInterface $customerRepository
    )
    {
    }

    /**
     * Get customers list
     *
     */
    public function list()
    {
        return $this->customerRepository->list();
    }

    /**
     * Method to create new record.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->customerRepository->create($attributes);
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
        if (!$this->customerRepository->isExists($id)) {
            throw ValidationException::withMessages([
                'id' => 'Please enter a valid id',
            ]);
        }

        if ($this->customerRepository->update($id, $attributes)) {
            return $this->customerRepository->find($id);
        }

        throw ValidationException::withMessages([
            'error' => 'Something went wrong',
        ]);
    }

    /**
     * Method to delete record by its primary key.
     *
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        if (!$this->customerRepository->isExists($id)) {
            throw ValidationException::withMessages([
                'id' => 'Please enter a valid id',
            ]);
        }

        $isDeleted = $this->customerRepository->delete($id);
        if ($isDeleted) {
            return $isDeleted;
        }

        throw ValidationException::withMessages([
            'error' => 'Something went wrong',
        ]);
    }
}
