<?php

namespace App\Http\Resources\Customers;

use App\Http\Resources\BaseResource;

/**
 * Class UpdateResource
 *
 * @package App\Http\Resources\Customers
 */
class UpdateResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param mixed $request
     * @return array
     */
    public function toArray(mixed $request): array
    {
        return $this->success(new CustomerResource($this->resource));
    }
}
