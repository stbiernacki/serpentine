<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\QueryBuilders;

use App\Infrastructure\Repository\Criteria\CriteriaInterface;
use App\Infrastructure\Repository\Exceptions\QueryNoResultsException;
use Closure;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;

class QueryBuilder
{
    /** @var CriteriaInterface[]|Closure[] */
    private array $criterias = [];

    /** @var string[] */
    private array $withoutPersistCriterias = [];

    /** @var string[] */
    protected $returnAsResult = [
        Model::class,
        AbstractPaginator::class,
        Collection::class,
    ];

    public function __construct(
        private Builder $query
    ) {
    }

    public function __call(
        mixed $name,
        array $arguments
    ): mixed {
        try {
            $this->applyCriterias();
            $result = call_user_func_array([$this->query, $name], $arguments);
        } catch (Exception $exception) {
            $this->fresh();

            if ($exception instanceof ModelNotFoundException) {
                throw new QueryNoResultsException($exception->getModel(), $exception->getIds());
            }

            throw $exception;
        }

        if (! is_object($result)) {
            $this->fresh();

            return $result;
        }

        foreach ($this->returnAsResult as $class) {
            if ($result instanceof $class) {
                $this->fresh();

                return $result;
            }
        }

        return $this;
    }

    public function fresh(): self
    {
        $this->criterias = [];
        $this->withoutPersistCriterias = [];
        $this->query = $this->model()->newQuery();

        return $this;
    }

    public function tableName(): string
    {
        return $this->model()->getTable();
    }

    public function addCriteria(CriteriaInterface | Closure $criteria): static
    {
        $this->criterias[] = $criteria;

        return $this;
    }

    public function applyCriterias(): void
    {
        foreach ($this->criterias as $criteria) {
            if ($criteria instanceof Closure) {
                $criteria($this->query);

                continue;
            }

            $criteria->apply($this->query);
        }
        $this->criterias = [];
    }

    public function getQuery(): Builder
    {
        return $this->query;
    }

    private function model(): Model
    {
        return $this->query->getModel();
    }
}
