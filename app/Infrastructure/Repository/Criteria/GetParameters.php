<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\Criteria;

class GetParameters
{
    public function __construct(
        private ?int $take = null,
        private ?int $skip = null,
        private string $orderByColumn = 'id',
        private string $orderByDirection = 'desc'
    ) {
    }

    public function take(): ?int
    {
        return $this->take;
    }

    public function skip(): ?int
    {
        return $this->skip;
    }

    public function orderByColumn(): string
    {
        return $this->orderByColumn;
    }

    public function orderByDirection(): string
    {
        return $this->orderByDirection;
    }
}
