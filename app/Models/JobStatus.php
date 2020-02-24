<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    public $fillable = [
        'id', 'job_id', 'status_id'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
