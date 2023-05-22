<?php

declare(strict_types=1);

namespace App\Domain\Category\Factories;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Enums\CategoryLocaleEnum;

class CategoryFactory
{
    public static function makeFromArray(array $data): Category
    {
        return static::make(
            new Category(),
            $data['type'] ?? null,
            $data['name'],
            CategoryLocaleEnum::from($data['locale']),
        );
    }

    public static function make(
        Category $category,
        ?string $type,
        string $name,
        CategoryLocaleEnum $categoryLocaleEnum,
    ): Category {
        $category->type = $type;
        $category->name = $name;
        $category->locale = $categoryLocaleEnum;

        return $category;
    }
}
