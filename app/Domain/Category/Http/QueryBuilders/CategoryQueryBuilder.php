<?php

declare(strict_types=1);

namespace App\Domain\Category\Http\QueryBuilders;

use App\Domain\Category\Criteria\WhereLocale;
use App\Domain\Category\Repositories\CategoryRepository;
use App\Infrastructure\QueryBuilder\IndexQueryBuilder;

class CategoryQueryBuilder extends IndexQueryBuilder
{
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        parent::__construct(
            repository: $categoryRepository,
            allowedFilters: [
                'locale',
            ],
        );
    }

    protected function filterByLocale(?string $locale): WhereLocale
    {
        return new WhereLocale(locale: $locale);
    }
}
