<?php

namespace App\Http\Requests;

use App\Models\AccountBalance;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class WithdrawValidationRequest extends FormRequest
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
            'withdraw_amount' => ['required', 'numeric', 'min:1', 'min:50', 'max:' . $balance->total_balance]
        ];
    }

    public function messages()
    {
        return [
            'withdraw_amount.max' => 'Insufficient balance to withdraw the requested amount.',
        ];
    }
}
