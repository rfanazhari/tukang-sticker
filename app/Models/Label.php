<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = [
        'name', 'permalink', 'isActive', 'user_id',
    ];

    public function gallery()
    {
        return $this->hasMany('App\Models\Gallery', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
