<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLoginInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip',
        'ip_location',
        'login_at',
        'user_agent',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
