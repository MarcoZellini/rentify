<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;
use Faker\Generator as Faker;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            Car::create([
                'brand' => $faker->word,
                'model' => $faker->word,
                'image' => $faker->imageUrl(),
                'price' => $faker->randomFloat(2, 0, 999),
                'notes' => $faker->paragraph,
                'transmission' => $faker->randomElement(['Automatic', 'Manual']),
                'fuel_type' => $faker->randomElement(['Diesel', 'Petrol', 'GPL', 'Eletric']),
                'seats' => $faker->numberBetween(2, 7),
            ]);
        }
    }
}
