<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Patient, Diagnosis, Bundle, Visit, Retention};
use Carbon\Carbon;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        /* Pasien contoh */
        $patient = Patient::create([
            'medical_rec_no' => 'RM000123',
            'name'           => 'Siti Aminah',
            'birth_date'     => '1990-05-12',
            'sex'            => 'P',
        ]);

        /* Diagnosis contoh */
        $diagnosis = Diagnosis::firstOrCreate(
            ['icd_code' => 'C91.0', 'description' => 'Leukemia limfoblastik akut']
        );

        /* Kunjungan */
        $visit = Visit::create([
            'patient_id'     => $patient->id,
            'diagnosis_id'   => $diagnosis->id,
            'visit_date'     => '2023-07-18',
            'last_care_unit' => 'Hemato-Onkologi',
        ]);

        /* Ikatan / Bundle */
        $bundle = Bundle::firstOrCreate(['bundle_no' => 1]);

        /* Berkas Retensi */
        Retention::create([
            'visit_id'          => $visit->id,
            'bundle_id'         => $bundle->id,
            'input_date'        => Carbon::now()->toDateString(),
            'seq_in_bundle'     => 1,
            'last_visit_year'   => 2023,
            'pages_count'       => 35,
            'special_case_flag' => false,
            'status'            => 'Aktif',
        ]);
    }
}
