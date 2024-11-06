<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('professions')->delete();
        $record = [
            [
                'profession_name' => 'Physician',
            ],
            [
                'profession_name' => 'Physician Assistant',
            ],
            [
                'profession_name' => 'Nurse Practitioner',
            ],
            [
                'profession_name' => 'Therapy',
            ],
            [
                'profession_name' => 'Medical Lab',
            ],
            [
                'profession_name' => 'Pharmacy',
            ],
            [
                'profession_name' => 'Healthcare Management',
            ],
            [
                'profession_name' => 'Imagine Radiology',
            ],
            [
                'profession_name' => 'Licensed Practical Nurse',
            ],
            [
                'profession_name' => 'Registered Nurse',
            ],
            [
                'profession_name' => 'Other',
            ]
        ];

        DB::table('professions')->insert($record);
    }
}
