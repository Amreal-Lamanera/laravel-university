<?php

use App\Department;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $names = [
            'Dipartimento di Biologia',
            'Dipartimento di Fisica e Astronomia',
            'Dipartimento di Matematica',
            'Dipartimento di Neuroscienze',
            'Dipartimento di Scienze Statistiche',
            'Dipartimento di Architettura',
            'Dipartimento di Ingegneria',
            'Dipartimento di Scienze Infermieristiche',
            'Dipartimento di Medicina',
        ];

        foreach ($names as $name) {
            $department = new Department();
            $department->name = $name;
            $department->address = $faker->address();
            $department->phone = $faker->phoneNumber();
            $department->email = $faker->email();
            $department->website = 'https://' . $faker->domainName();
            $department->head_of_department = $faker->name();

            $department->save();
        }
    }
}
