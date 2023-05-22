<?php

declare(strict_types=1);

namespace App\Domain\Category\Transformers;

use App\Domain\Category\Entities\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category): array
    {
        return [
            'id' => $category->getKey(),
            'type' => $category->type,
            'name' => $category->name,
            'locale' => $category->locale,
        ];
    }
}
