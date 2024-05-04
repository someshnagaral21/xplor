<?php

namespace App\Http\Resources;

/**
 * Class SuccessResource
 * This class contains success resource function
 *
 * @package App\Http\Resources
 */
class SuccessResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param mixed $request
     * @return array
     */
    public function toArray(mixed $request): array
    {
        return $this->success($this->resource);
    }
}
