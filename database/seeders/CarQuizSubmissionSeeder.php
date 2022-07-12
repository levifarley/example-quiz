<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\CarQuizSubmission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CarQuizSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        CarQuizSubmission::factory()->count(12)->create();

        // Explicitly re-enable foreign key check
        Schema::enableForeignKeyConstraints();
    }
}
