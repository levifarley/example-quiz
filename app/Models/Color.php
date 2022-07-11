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
     * @param string $string
     * @return mixed
     */
    public static function pluck(string $string): mixed
    {
        return self::pluck($string);
    }

    /**
     * Get cars a color can belong to
     *
     * @return BelongsToMany
     */
    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(
            Car::class,
            CarQuizSubmission::class
        );
    }
}
