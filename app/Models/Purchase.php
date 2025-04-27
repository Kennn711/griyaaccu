<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PDO;

class Purchase extends Model
{
    protected $guarded = [
        'purchase_date',
        'due_date',
        'payment_date',
        'purchase_status',
    ];

    // Relation On Purchase Detail Table
    public function purchasedetail()
    {
        return $this->hasMany(PurchaseDetail::class);
    }
    // Relation On Purchase Detail Table END


    // Function to return current date on Purchase Store Function
    static function purchase_date()
    {
        return now();
    }
    // Function to return current date on Purchase Store Function END
}
