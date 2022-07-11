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
     * @param string $string
     * @return mixed
     */
    public static function pluck(string $string): mixed
    {
        return self::pluck($string);
    }

    /**
     * Get a manufacturer's cars
     *
     * @return HasMany
     */
    public function cars(): HasMany
    {
        return $this->hasMany(
            Car::class,
            'manufacturer_id',
            'id',
        );
    }
}
