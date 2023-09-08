<?php

namespace App\Models;

use App\Enums\TransactionStatusCodeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'paid_amount',
        'currency',
        'parent_email',
        'status_code',
        'payment_date',
        'parent_identification'
    ];

    protected $casts = [
        'status_code' => TransactionStatusCodeEnum::class
    ];

    public $timestamps = false;


    // Start Relations

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'email', 'parent_email');
    }

    // End Relations
}
