<?php

namespace App\Services\Customers;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;
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

        //Log the validation error in future
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

        //Log the validation error in future
        throw ValidationException::withMessages([
            'error' => 'Something went wrong',
        ]);
    }

    /**
     * Get the customer index pag related data
     *
     * @param array $getData
     * @return array
     */
    public function getIndexData(array $getData): array
    {
        return [];
    }

    /**
     * Get customer data for datatable
     *
     * @param array $request
     * @return array
     */
    public function getCustomerDataTable(array $request): array
    {
        $draw = Arr::get($request, 'draw');
        $start = Arr::get($request, 'start');
        $rowperpage = Arr::get($request, 'length'); // Rows display per page

        $orderArr = Arr::get($request, 'order', []);
        $columnNameArr = Arr::get($request, 'columns');
        $searchArr = Arr::get($request, 'search');

        $columnIndex = Arr::get($orderArr, '0.column', '0'); // Column index
        $columnName = $columnNameArr[$columnIndex]['data']; // Column name
        $columnSortOrder = Arr::get($orderArr, '0.dir', 'asc');; // asc or desc
        $searchValue = $searchArr['value']; // Search value

        $filters = [
            'sort_col' => $columnName,
            'sort_order' => $columnSortOrder,
            'search' => $searchValue,
            'start' => $start,
            'length' => $rowperpage,
        ];

        // Total records
        $totalRecords = $this->customerRepository->getTotalCount();
        $totalRecordsWithFilter = $this->customerRepository->getRecordCountWithFilter($filters);

        // Fetch records
        $records = $this->customerRepository->getRecords($filters);

        $dataArray = $this->prepareDataTableData($records);

        return [
            'draw' => intval($draw),
            'iTotalRecords' => $totalRecords,
            'iTotalDisplayRecords' => $totalRecordsWithFilter,
            'aaData' => $dataArray
        ];
    }

    /**
     * Prepare array for datatable
     *
     * @param Collection $records
     * @return array
     */
    private function prepareDataTableData(Collection $records): array
    {
        $dataArray = [];
        foreach ($records as $record) {
            $dataArray[] = [
                'id' => $record->id,
                'name' => $record->name,
                'email' => $record->email,
            ];
        }

        return $dataArray;
    }
}
