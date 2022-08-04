<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    public function __construct(protected Manufacturer $manufacturer) {}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // We want to preserve the order of the manufacturers
        ($factory = Manufacturer::factory())
            ->count(5)
            ->sequence(fn($sequence) => $factory->getManufacturers()[$sequence->index])
            ->create();
    }
}
