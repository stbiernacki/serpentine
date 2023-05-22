<?php

declare(strict_types=1);


namespace App\Domain\Category\Database\Factories;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Enums\CategoryLocaleEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Category make($attributes = [], ?Model $parent = null)
 * @method Category create($attributes = [], ?Model $parent = null)
 */
class CategoryFactory extends Factory
{
    /** @var string */
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->text(30),
            'locale' => $this->faker->randomElement(CategoryLocaleEnum::toArray()),
        ];
    }
}
