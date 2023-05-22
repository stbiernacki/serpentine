<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\Criteria;

use Illuminate\Database\Eloquent\Builder;

class GetCriteria implements CriteriaInterface
{

    public function __construct(
        private ?int $take = null,
        private ?int $skip = null,
        private string $orderByColumn = 'id',
        private string $orderByDirection = 'desc'
    ) {
    }

    public function apply(Builder $query): void
    {
        $query->orderBy($this->orderByColumn, $this->orderByDirection)
            ->when($this->take, function (Builder $query, int $take): void {
                $query->take($take);
            })
            ->when($this->skip, function (Builder $query, int $skip): void {
                $query->skip($skip);
            });
    }
}
