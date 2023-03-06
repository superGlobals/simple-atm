<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'account_id' => ['required', 'size:12', Rule::unique('customers', 'account_id')],
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', Rule::unique('customers', 'email')],
            'password' => ['required', 'min:4', 'max:8']
        ];
    }
}
