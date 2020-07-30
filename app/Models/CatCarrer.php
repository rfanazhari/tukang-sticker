<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatCarrer extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'permalink', 'isActive', 'user_id',
    ];

    public function career()
    {
        return $this->hasMany('App\Models\Carrer', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
