<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $fillable = [
        'division_id',
        'name',
        'description'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
