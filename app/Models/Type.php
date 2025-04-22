<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'type_name'
    ];

    public function accu()
    {
        return $this->hasMany(Accu::class, 'type_id');
    }
}
