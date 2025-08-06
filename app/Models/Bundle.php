<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $fillable = ['bundle_no'];

    /** 1 bundle memiliki banyak retention */
    public function retentions()
    {
        return $this->hasMany(Retention::class);
    }
}
