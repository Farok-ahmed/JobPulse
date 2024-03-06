<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i <25 ; $i++) {
            $faker = Faker::create();
            $studet= new Student;
            $studet->name=$faker->name();
            $studet->email=$faker->email();
            $studet->city=$faker->city();
            $studet->age=$faker->numberBetween(18,60);
            $studet->country=$faker->countryCode();
            $studet->save();
        }
    }
}
