<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PDO;

class Purchase extends Model
{
    protected $guarded = [
        'accu_id',
        'purchase_date',
        'due_date',
        'payment_date',
        'quantity',
        'purchase_status',
    ];

    // Function on Purchase Store
    static function purchase_date()
    {
        return now();
    }
}
