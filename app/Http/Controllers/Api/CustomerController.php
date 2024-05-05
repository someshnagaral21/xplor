<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Http\Resources\Customers\{
    ListResource,
    StoreResource,
    UpdateResource,
    DeleteResource
};
use App\Http\Controllers\Controller;
use App\Services\Customers\{
    CustomerService,
    Requests\Api\ViewCustomersRequest,
    Requests\Api\StoreCustomerRequest,
    Requests\Api\UpdateCustomerRequest,
    Requests\Api\DeleteCustomerRequest
};

class CustomerController extends Controller
{
    /**
     * CustomerController constructor
     *
     * @return void
     */
    public function __construct(private CustomerService $customerService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ViewCustomersRequest $request)
    {
        return (new ListResource($this->customerService->list()))
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        return (new StoreResource($this->customerService->create($request->validated())))
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $customer)
    {
        return (new UpdateResource($this->customerService->update($customer, $request->validated())))
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCustomerRequest $request, string $customer)
    {
        return (new DeleteResource($this->customerService->delete($customer)))
                ->response()
                ->setStatusCode(Response::HTTP_OK);
    }
}
