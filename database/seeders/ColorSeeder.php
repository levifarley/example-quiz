<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function __construct(protected Color $color) {}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Color::factory()->count(7)->create();
    }
}
