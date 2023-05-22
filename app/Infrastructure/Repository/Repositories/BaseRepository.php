<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\Repositories;

use App\Infrastructure\Repository\Criteria\CriteriaInterface;
use App\Infrastructure\Repository\QueryBuilders\QueryBuilder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /** @var QueryBuilder */
    protected $query;

    public function __construct()
    {
        $this->newQuery();
    }

    abstract protected function model(): string;

    public function paginate(
        int $perPage,
        string $orderByColumn = 'id',
        string $orderByDirection = 'desc',
        int $page = null
    ): LengthAwarePaginator {
        return $this->query->orderBy($orderByColumn, $orderByDirection)
            ->paginate($perPage, ['*'], 'page', $page);
    }

    public function save(Model $model): Model
    {
        $model->save();

        return $model;
    }

    public function newQuery(): self
    {
        $this->query = new QueryBuilder($this->model()::query());

        return $this;
    }

    public function addCriteria(CriteriaInterface $criteria): static
    {
        $this->query->addCriteria($criteria);

        return $this;
    }

    public function getQuery(): QueryBuilder
    {
        return $this->query;
    }
}
