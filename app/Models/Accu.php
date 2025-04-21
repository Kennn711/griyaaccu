<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accu extends Model
{
    protected $fillable = [
        'accu_name',
        'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
