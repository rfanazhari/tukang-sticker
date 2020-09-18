<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'trx_id',
        'customer_id',
        'created_by',
        'updated_by',
        'payment_type',
        'status',
        'status_reservation',
        'delivery_address',
        'total_cost_price',
        'total_selling_price',
        'delivery_order',
        'created_at',
        'updated_at',
        'status_payment',
        'date_payment',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function details()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'trx_id');
    }
}
