<?php

declare(strict_types=1);

namespace App\Infrastructure\QueryBuilder;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class IndexQueryBuilder extends QueryBuilder
{
    public function paginateFromRequest(Request $request): LengthAwarePaginator
    {
        return $this->paginate(
            limit: (int) $request->input('limit', 50),
            filters: $request->input('filters', []),
        );
    }

    public function paginate(
        int $limit,
        array $filters = [],
    ): LengthAwarePaginator {
        $repository = $this($filters);

        return $repository->paginate(perPage: $limit);
    }
}
