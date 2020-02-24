<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobLevel extends Model
{
    public $fillable = [
        'id', 'name',
    ];

    // public function level()
    // {
    //     return $this->belongsTo(Level::class);
    // }
}
