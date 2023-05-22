<?php

declare(strict_types=1);

namespace App\Domain\Category\Entities;

use App\Domain\Category\Database\Factories\CategoryFactory;
use App\Domain\Category\Enums\CategoryLocaleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @method static CategoryFactory factory(array $data=[])
 */
class Category extends Model
{
    use HasFactory, Notifiable;

    protected $casts = [
        'locale' => CategoryLocaleEnum::class,
    ];

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }
}
