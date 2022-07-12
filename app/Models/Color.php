<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Get cars a color can belong to
     *
     * @return BelongsToMany
     */
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(
            Car::class,
            CarQuizSubmission::class,
            'color_id',
            'car_id',
            'id',
            'id',
            'colors'
        );
    }

    /**
     * Get quiz submissions a color can belong to
     *
     * @return BelongsTo
     */
    public function submissions(): BelongsTo
    {
        return $this->belongsTo(
            CarQuizSubmission::class,
            'color_id',
            'id'
        );
    }
}
