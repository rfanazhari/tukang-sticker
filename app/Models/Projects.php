<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'type',
        'label_id',
        'name',
        'imgHeader',
        'description',
        'permalink',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public function label()
    {
        return $this->belongsTo('App\Models\Label', 'label_id');
    }

    public function wallpaper()
    {
        return $this->hasMany('App\Models\Wallpaper', 'id');
    }
}
