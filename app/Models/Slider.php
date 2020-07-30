<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'alt', 'caption', 'based_64', 'url', 'isActive', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
