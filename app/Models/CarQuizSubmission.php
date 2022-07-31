<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarQuizSubmission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'car_id',
        'color_id'
        //'user_id'
    ];

    /**
     * Get a quiz submission's selected car
     *
     * @return HasOne
     */
    public function car(): HasOne
    {
        return $this->hasOne(
            Car::class,
            'id',
            'car_id',
        );
    }

    /**
     * Get a quiz submission's selected color
     *
     * @return HasOne
     */
    public function color(): HasOne
    {
        return $this->hasOne(
            Color::class,
            'id',
            'color_id'
        );
    }

    public function getMostPopularCarAndColor() {} // TODO:

    public function getMostPopularCar() {} // TODO:

    public function getMostPopularColor() {} // TODO:
}
