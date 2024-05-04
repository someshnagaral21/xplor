<?php

namespace App\Http\Resources\Customers;

use App\Http\Resources\BaseResource;

/**
 * Class DeleteResource
 *
 * @package App\Http\Resources\Customers
 */
class DeleteResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param mixed $request
     * @return array
     */
    public function toArray(mixed $request): array
    {
        if ($this->resource) {
            return $this->success([]);
        }
        
        return $this->error([
            'error' => 'Something went wrong'
        ]);
    }
}
