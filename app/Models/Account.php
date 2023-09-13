<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_of_birth',
        'address',
        'phone',
        'bio',
        'facebook_url',
        'province',
        'district',
        'village',
        'school'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }
}
