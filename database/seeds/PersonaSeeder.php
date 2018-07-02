<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Persona;
use Faker\Factory as Faker;

class PersonaSeeder extends Seeder {

    public function run()
    {
        $faker=Faker::create();
        for($i=0; $i<200; $i++)
        {
            Persona::create
            ([
                'dui'=>$faker->randomNumber(9),
                'nombre'=>$faker->firstName(),
                'apellido'=>$faker->lastName (),
                'fechaNacimiento'=>$faker->date()
            ]);
        }
    }
}
