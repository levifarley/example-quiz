<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'manufacturer_id',
        'model'
    ];

    /**
     * Get a car's manufacturer
     *
     * @return BelongsTo
     */
    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(
            Manufacturer::class,
            'manufacturer_id',
            'id',
        );
    }

    /**
     * Get a car's available colors
     *
     * @return BelongsToMany
     */
    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(
            Color::class,
            CarQuizSubmission::class,
            'car_id',
            'color_id',
            'id',
            'id',
            'cars'
        )
        ->withTimestamps();
    }
}
