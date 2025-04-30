<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PDO;

class Purchase extends Model
{
    protected $fillable = [
        'purchase_code',
        'purchase_date',
        'due_date',
        'total_discount',
        'subtotal_ppn',
        'total',
        'payment_date',
        'purchase_status',
    ];

    // Relation On Purchase Detail Table
    public function purchasedetail()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
    // Relation On Purchase Detail Table END

    public function accu()
    {
        return $this->belongsTo(Accu::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Function to return current date on Purchase Store Function
    static function purchase_date()
    {
        return now();
    }
    // Function to return current date on Purchase Store Function END
}
