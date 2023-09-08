<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\GetUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __invoke(GetUserRequest $request)
    {
        return UserResource::collection(
            User::query()
                ->withWhereHas('transactions', function ($builder)  use ($request) {
                    $builder
                        ->when(
                            value: $request->filled('status_code'),
                            callback: fn (Builder $builder) => $builder->where('status_code', $request->get('status_code'))
                        )
                        ->when(
                            value: $request->filled('currency'),
                            callback: fn (Builder $builder) => $builder->where('currency', $request->get('currency'))
                        )
                        ->when(
                            value: $request->filled('amount_from'),
                            callback: fn (Builder $builder) => $builder->where('paid_amount', '>=', $request->get('amount_from'))
                        )
                        ->when(
                            value: $request->filled('amount_to'),
                            callback: fn (Builder $builder) => $builder->where('paid_amount', '<=', $request->get('amount_to'))
                        )
                        ->when(
                            value: $request->filled('date_from'),
                            callback: fn (Builder $builder) => $builder->whereDate('payment_date', '>=', $request->date('date_from')->format('Y-m-d'))
                        )
                        ->when(
                            value: $request->filled('date_to'),
                            callback: fn (Builder $builder) => $builder->whereDate('payment_date', '<=', $request->date('date_to')->format('Y-m-d'))
                        );
                })
                ->get()
        );
    }
}
