<?php

namespace App\Http\Requests;

use App\Enums\TransactionStatusCodeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'status_code' => ['nullable', Rule::enum(TransactionStatusCodeEnum::class)],
            'currency' => ['nullable', Rule::in(['SAR', 'USD', 'AED', 'EUR'])],
            'amount_from' => 'nullable|numeric',
            'amount_to' => 'nullable|numeric',
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date',
        ];
    }
}
