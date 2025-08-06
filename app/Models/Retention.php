<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retention extends Model
{
    protected $fillable = [
        'visit_id','bundle_id','input_date','seq_in_bundle',
        'last_visit_year','pages_count','special_case_flag',
        'special_case_type','status'
    ];

    /** retention milik 1 bundle */
    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }

    /** retention milik 1 visit */
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    /** shortcut agar bisa load 'retentions.patient' */
    public function patient()
    {
        // has-one-through: lewat tabel visits
        return $this->hasOneThrough(
            Patient::class,    // model tujuan
            Visit::class,      // perantara
            'id',              // FK di visits
            'id',              // FK di patients
            'visit_id',        // FK di retentions
            'patient_id'       // FK di visits
        );
    }
}
