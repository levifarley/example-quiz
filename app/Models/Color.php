<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    /**
     * Get cars a color can can belong to
     *
     * @return BelongsToMany
     */
    public function car(): BelongsToMany
    {
        return $this->belongsToMany(
            Car::class,
            'car_quiz_submissions',
            'color_id',
            'car_id',
            'id',
            'id',
            'color'
        )
        ->withTimestamps();
    }
}
