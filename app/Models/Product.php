<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'permalink',
    ];

    public function transaction_details()
    {
        return $this->hasMany('App\Models\TransactionDetail');
    }
}
