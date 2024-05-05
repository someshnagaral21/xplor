<?php

namespace App\Http\Resources;

/**
 * Class ErrorResource
 * This class contains error resource function
 *
 * @package App\Http\Resources
 */
class ErrorResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param mixed $request
     * @return array
     */
    public function toArray(mixed $request): array
    {
        return $this->error($this->resource);
    }
}
