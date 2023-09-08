<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'balance',
        'currency',
        'email',
        'created_at'
    ];

    public $timestamps = false;

    protected $casts = [
        'id' => 'string',
    ];


    // Start Relations

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'parent_email', 'email');
    }

    // End Relations
}
