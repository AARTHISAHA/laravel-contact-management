<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
    ];

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
