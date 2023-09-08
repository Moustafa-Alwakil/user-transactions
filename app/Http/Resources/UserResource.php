<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'balance' => $this->balance,
            'currency' => $this->currency,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'transactions' => TransactionResource::collection($this->whenLoaded('transactions'))
        ];
    }
}
