<?php

namespace App\Services\Customers\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class DeleteCustomerRequest
 * Request for viewing customers
 *
 * @package App\Services\Customers\Requests\Api
 */
class DeleteCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            
        ];
    }
}