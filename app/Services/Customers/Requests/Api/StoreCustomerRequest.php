<?php

namespace App\Services\Customers\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreCustomerRequest
 * Request to store customers
 *
 * @package App\Services\Customers\Requests\Api
 */
class StoreCustomerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email',
        ];
    }
}
