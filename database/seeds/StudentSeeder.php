<?php

use Illuminate\Database\Seeder;
use App\Student;
use Faker\Generator as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $student = new Student();
            $student->name = $faker->firstName();
            $student->surname = $faker->lastName();
            $student->date_of_birth = $faker->date();
            $student->fiscal_code = strtoupper($faker->unique()->bothify('??????##?##?###?'));
            $student->enrolment_date = $faker->date();
            $student->registration_number = $faker->unique()->randomNumber(5, true);
            $student->email = $faker->unique()->email();

            $student->save();
        }
    }
}
