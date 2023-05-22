<?php

declare(strict_types=1);

namespace App\Infrastructure\QueryBuilder;

use App\Infrastructure\Repository\Repositories\BaseRepository;
use Illuminate\Support\Str;
use InvalidArgumentException;

class QueryBuilder
{
    /**
     * @param string[] $allowedFilters
     */
    public function __construct(
        protected BaseRepository $repository,
        protected array $allowedFilters = [],
    ) {
    }

    public function __invoke(
        array $filters = []
    ): BaseRepository {
        if (! empty($filters)) {
            $this->filter($filters);
        }

        return $this->repository;
    }

    protected function filter(array $filters): void
    {
        foreach ($filters as $key => $filter) {

            $methodName = 'filterBy'.Str::of((string) $key)
                    ->ucfirst()
                    ->replace('.', '')
                    ->camel();
            if (! method_exists($this, $methodName)) {
                throw new InvalidArgumentException("Method {$methodName} not present in ".get_class($this));
            }
            $criteria = $this->$methodName($filter);
            if ($criteria === null) {
                continue;
            }

            $this->repository->addCriteria($criteria);
        }
    }
}
