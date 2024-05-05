<?php

namespace App\Http\Resources\Customers;

use Illuminate\Http\Request;
use App\Http\Resources\BaseResource;

/**
 * Class CustomerResource
 *
 * @package App\Http\Resources\Customers
 */
class CustomerResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this?->id,
            'name' => $this?->name,
            'email' => $this?->email,
            'created_at' => $this?->created_at,
            'updated_at' => $this?->updated_at,
        ];
    }
}
