<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = [
        'purchase_id',
        'accu_id',
        'price',
        'quantity',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function accu()
    {
        return $this->belongsTo(Accu::class);
    }
}
