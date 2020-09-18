<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'trx_id',
        'product_id',
        'satuan_dimensi',
        'dimensi',
        'satuan_qty',
        'qty',
        'cost_price',
        'selling_price',
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
