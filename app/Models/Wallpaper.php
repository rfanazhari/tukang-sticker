<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
    protected $fillable = [
        'project_id',
        'template_id',
        'label_id',
        'based_64',
        'user_id',
    ];

    public $timestamps = false; 

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public function label()
    {
        return $this->belongsTo('App\Models\Label', 'label_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Projects', 'project_id');
    }
}
