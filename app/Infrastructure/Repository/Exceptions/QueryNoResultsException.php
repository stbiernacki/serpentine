<?php

namespace App\Infrastructure\Repository\Exceptions;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class QueryNoResultsException extends RuntimeException
{
    public function __construct(string $model, int | array $ids = [])
    {
        $message = "No query results for model [{$model}]";

        if (is_array($ids) && count($ids) > 0) {
            $message .= ' '.implode(', ', $ids);
        } else {
            $message .= '.';
        }

        parent::__construct(
            message: $message,
            code: Response::HTTP_NOT_FOUND
        );
    }
}
