<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'label_id' ,'alt', 'based_64', 'isActive', 'user_id',
     ];
 
     public function labels()
     {
         return $this->belongsTo('App\Models\Label', 'label_id');
     }
 
     public function user()
     {
         return $this->belongsTo(User::class);
     }
}
