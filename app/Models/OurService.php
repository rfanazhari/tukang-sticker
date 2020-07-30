<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
    protected $fillable = [
        'name', 'based_64', 'description', 'permalink', 'url', 'isActive', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
