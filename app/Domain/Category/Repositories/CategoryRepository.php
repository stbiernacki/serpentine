<?php

declare(strict_types=1);

namespace App\Domain\Category\Repositories;

use App\Domain\Category\Entities\Category;
use App\Infrastructure\Repository\Repositories\BaseRepository;

/**
 * @method Category save(Category $model)
 */
class CategoryRepository extends BaseRepository
{
    protected function model(): string
    {
        return Category::class;
    }
}
