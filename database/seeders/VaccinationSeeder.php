<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            ['patient_name' => 'Baby Amir Hassan', 'purok' => 'Purok 2', 'vaccine' => 'BCG',
             'dose' => '1st dose', 'scheduled_at' => '2026-11-05', 'status' => 'Scheduled'],
            ['patient_name' => 'Baby Liza Mangubat', 'purok' => 'Purok 4', 'vaccine' => 'Pentavalent',
             'dose' => '2nd dose', 'scheduled_at' => '2026-10-15', 'status' => 'Done'],
            ['patient_name' => 'Baby Noel Sarmiento', 'purok' => 'Purok 1', 'vaccine' => 'OPV',
             'dose' => '3rd dose', 'scheduled_at' => '2026-10-22', 'status' => 'Overdue'],
            ['patient_name' => 'Aisha Datumanong', 'purok' => 'Purok 5', 'vaccine' => 'MMR',
             'dose' => '1st dose', 'scheduled_at' => '2026-11-12', 'status' => 'Scheduled'],
            ['patient_name' => 'Lolo Ramon Villacorta', 'purok' => 'Purok 3', 'vaccine' => 'Anti-Flu',
             'dose' => 'Annual', 'scheduled_at' => '2026-10-08', 'status' => 'Done'],
            ['patient_name' => 'Lola Esperanza Tumampos', 'purok' => 'Purok 2', 'vaccine' => 'Pneumococcal (PPV23)',
             'dose' => 'Single dose', 'scheduled_at' => '2026-11-20', 'status' => 'Scheduled'],
            // Birthday row (May 23)
            ['patient_name' => 'Baby Farhana Asjali', 'purok' => 'Purok 6', 'vaccine' => 'Hepatitis B',
             'dose' => 'Booster', 'scheduled_at' => '2026-05-23', 'status' => 'Done'],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
