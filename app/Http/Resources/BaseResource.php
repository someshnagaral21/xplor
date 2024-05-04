<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class BaseResource
 * This class contains common resource functions
 *
 * @package App\Http\Resources
 */
class BaseResource extends JsonResource
{
    /**
     * Forms and returns success response.
     *
     * @param mixed $data
     * @param bool $addPagination
     * @return array
     */
    public function success(mixed $data, bool $addPagination = false): array
    {
        $response = [
            'success' => true,
            'data' => $data,
            'errors' => null,
        ];

        if ($addPagination) {
            $response['pagination'] = $this->paginationDetails();
        }

        return $response;
    }

    /**
     * Returns the pagination details.
     *
     * @return array
     */
    protected function paginationDetails(): array
    {
        return [
            'total' => $this->total(),
            'count' => $this->count(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'total_pages' => $this->lastPage(),
            'first_page_url' => $this->path(),
            'last_page_url' => $this->url($this->lastPage()),
            'next_page_url' => $this->nextPageUrl(),
            'prev_page_url' => $this->previousPageUrl(),
        ];
    }

    /**
     * Forms and returns error response.
     *
     * @param mixed $messages
     * @return array
     */
    public function error(mixed $messages): array
    {
        return [
            'success' => false,
            'data' => null,
            'errors' => $messages,
        ];
    }
}
