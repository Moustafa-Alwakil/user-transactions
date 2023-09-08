<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'paid_amount' => $this->paid_amount,
            'currency' => $this->currency,
            'parent_email' => $this->parent_email,
            'status' => $this->status_code->name,
            'payment_date' => $this->payment_date,
            'parent_identification' => $this->parent_identification
        ];
    }
}
