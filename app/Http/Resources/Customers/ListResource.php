<?php

namespace App\Http\Resources\Customers;

use App\Http\Resources\BaseResource;

/**
 * Class ListResource
 *
 * @package App\Http\Resources\Customers
 */
class ListResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param mixed $request
     * @return array
     */
    public function toArray(mixed $request): array
    {
        return $this->success(CustomerResource::collection($this->resource), true);
    }
}
