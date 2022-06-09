<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,10) as $val){
            DB::table('students')->insert([
                'name'=>$faker->name(),
                'email'=>$faker->unique()->safeEmail(),
                'age'=> random_int(11,99)
            ]);
        }
    }
}
