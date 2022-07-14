<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type'
    ];

    /**
     * Get a manufacturer's cars
     *
     * @return HasMany
     */
    public function car(): HasMany
    {
        return $this->hasMany(
            Car::class,
            'manufacturer_id',
            'id',
        );
    }
}
