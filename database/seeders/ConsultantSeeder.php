<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ConsultantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->where('role_id',2)->delete();
        $record = [
            [
                'id' => 2,
                'name' => 'Dr Kutty',
                'email' => 'kutty@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'id' => 3,
                'name' => 'Dr Sharma',
                'email' => 'ss@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'id' => 4,
                'name' => 'Dr Gupta',
                'email' => 'gg@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'id' => 5,
                'name' => 'Dr Tata',
                'email' => 'tt@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            [
                'id' => 6,
                'name' => 'Dr Max',
                'email' => 'max@gmail.com',
                'password' => bcrypt('12345678'),
                'role_id' => 2
            ],
            
        ];

        DB::table('users')->insert($record);
    }
}
