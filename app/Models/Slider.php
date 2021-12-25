<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'url',
        'sort_order',
        'active'
    ];
}
