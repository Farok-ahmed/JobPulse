<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'compnay',
                'email' => 'company@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'company'
            ],
            [
                'name' => 'candidate',
                'email' => 'candidate@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'candidate'
            ]
        ]);
    }
}
