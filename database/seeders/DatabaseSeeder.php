<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarFeatures;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Maker::factory()->create();
        State::factory()->create();
        City::factory()->create();
        Model::factory()->create();
        CarType::factory()->create();
        FuelType::factory()->create();
        User::factory()->create();

        Car::factory()->create();
        CarImage::factory()->create();
        CarFeatures::factory()->create();

        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(CarImage::factory()->count(5), 'images')
                    ->hasFeatures(),
                'favCars'
            )
            ->create();
    }
}
