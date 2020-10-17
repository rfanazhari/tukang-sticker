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

    public function template()
    {
        return $this->hasMany('App\Models\Template', 'id');
    }

    public function project()
    {
        return $this->hasMany('App\Models\Project', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
