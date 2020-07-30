<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    protected $fillable = [
        'alt', 'based_64', 'isActive', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
