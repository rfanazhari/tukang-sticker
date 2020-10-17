<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'label_id', 'imgHeader', 'isActive', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function labels()
     {
        return $this->belongsTo('App\Models\Label', 'label_id');
     }
}
