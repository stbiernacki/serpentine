<?php

declare(strict_types=1);

namespace App\Domain\Category\Criteria;

use App\Infrastructure\Repository\Criteria\CriteriaInterface;
use Illuminate\Database\Eloquent\Builder;

class WhereLocale implements CriteriaInterface
{
    public function __construct(private ?string $locale)
    {
    }

    public function apply(Builder $query): void
    {
        $query->where('locale', $this->locale);
    }
}
