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
       Manufacturer::factory()->count(5)->create();
    }
}
