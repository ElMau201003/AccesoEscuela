<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estudiante;
use Faker\Factory as Faker;

class EstudianteSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('es_PE');

        for ($i = 0; $i < 100; $i++) {
            Estudiante::create([
                'dni' => $faker->unique()->numerify('########'),
                'nombre' => $faker->firstName . ' ' . $faker->lastName,
                'edad' => $faker->numberBetween(6, 12),
                'zona' => $faker->randomElement(['Rural', 'Urbana']),
                'internet' => $faker->boolean(70), // 70% con internet
                'nivel_socioeconomico' => $faker->randomElement(['Bajo', 'Medio', 'Alto']),
                'created_at' => $faker->dateTimeBetween('-6 months', 'now'),
            ]);
        }
    }
}
