<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use SoftDeletes;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('car_quiz_submissions', function (Blueprint $table) {
            $table->foreignId('car_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('color_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['car_id', 'color_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('car_quiz_submissions');
    }
};
