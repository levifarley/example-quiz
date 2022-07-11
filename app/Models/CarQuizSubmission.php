<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarQuizSubmission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'car_id',
        'color_id'
        //'user_id'
    ];
}
