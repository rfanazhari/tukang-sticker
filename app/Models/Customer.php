<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'type',
        'companyName',
        'picName',
        'email',
        'phone',
        'address',
        'user_id',
     ];
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
