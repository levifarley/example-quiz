<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Define the seeders we need explicitly to seed all required tables in the proper order
        $seeders = [
            ManufacturerSeeder::class,
            CarSeeder::class,
            ColorSeeder::class,
        ];

        // Populate required example data
        $this->call($seeders);
    }
}
