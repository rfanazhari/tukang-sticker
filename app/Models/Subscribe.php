<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $fillable = [
        'name', 
        'surname', 
        'email', 
        'phone', 
        'message',
        'created_at',
    ];
    public $timestamps = false;
    protected $casts = [
        'sendAt' => 'datetime',
    ];
}
