<?php

declare(strict_types=1);

namespace App\Domain\Category\Tests\Unit\Transformers;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Transformers\CategoryTransformer;
use App\Infrastructure\Abstracts\TestCase;

class CategoryTransformerTest extends TestCase
{
    public function testCategoryTransformerTransformElement(): void
    {
        $category = Category::factory()->make();

        $fractal = fractal($category, new CategoryTransformer())->toArray();

        $this->assertEquals([
            'data' => [
                'id' => $category->getKey(),
                'type' => $category->type,
                'name' => $category->name,
                'locale' => $category->locale,
            ]
        ], $fractal);
    }
}
