<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\Criteria;

use Illuminate\Database\Eloquent\Builder;

interface CriteriaInterface
{
    public function apply(Builder $query): void;
}
