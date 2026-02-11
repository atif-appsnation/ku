<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            DB::table('files')->insert([
                'name' => $faker->name,
                'enrollment' => $faker->numerify('E#########'),
                'cell' => $faker->phoneNumber,
                'email' => $faker->email,
                'fee_voucher' => $faker->bothify('FV-######'),
                'filename' => $faker->word,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
