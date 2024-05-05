<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\ {
    Contracts\Support\Renderable,
    Http\JsonResponse,
    Http\Response,
};
use App\Services\Customers\CustomerService;
use App\Services\Customers\Requests\ViewCustomersRequest;

/**
 * Class CustomerController
 * Controller class for Customer Management
 *
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * Constructor function for CustomerController
     *
     * @param CustomerService $customerService
     */
    public function __construct(
        private CustomerService $customerService
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param ViewCustomersRequest $request
     * @return Renderable
     */
    public function index(ViewCustomersRequest $request): Renderable
    {
        try {
            $result = $this->customerService->getIndexData(request()->query());
        } catch (Exception $exception) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY, $exception->getMessage());
        }

        return view('customers.index', $result);
    }

    /**
     * Get customer data in datatable
     *
     * @param ViewCustomersRequest $request
     * @return JsonResponse
     */
    public function getCustomerData(ViewCustomersRequest $request): JsonResponse
    {
        try {
            $response = $this->customerService->getCustomerDataTable($request->toArray());
        } catch (Exception $exception) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY, $exception->getMessage());
        }

        return response()->json($response);
    }
}
