<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public function retentions()
    {
        return $this->hasOne(Retention::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
