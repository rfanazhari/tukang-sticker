<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrer extends Model
{
    protected $fillable = [
       'cat_carrer_id' ,'name', 'location', 'description', 'url', 'isActive', 'expired', 'user_id',
    ];

    public function catcarrer()
    {
        return $this->hasOne('App\Models\CatCarrer', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
