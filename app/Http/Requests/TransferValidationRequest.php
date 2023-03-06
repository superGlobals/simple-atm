<?php

namespace App\Http\Requests;

use App\Models\AccountBalance;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class TransferValidationRequest extends FormRequest
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
        $account_id = Auth::guard('customer')->user()->account_id;
        $balance = AccountBalance::where('account_id', $account_id)->first();

        return [
            'transfer_amount' => ['required', 'numeric', 'min:1', 'min:50', 'max:' . $balance->total_balance],
            'transfer_to' => ['required', Rule::exists('customers', 'account_id')->where(function ($query) {
                return $query->where('account_id', $this->input('transfer_to'));
            })]
        ];
    }

    public function messages()
    {
        return [
            'transfer_to.exists' => 'The recipient account number does not exist.',
        ];
    }
}
