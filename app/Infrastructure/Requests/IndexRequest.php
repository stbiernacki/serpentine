<?php

declare(strict_types=1);

namespace App\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest  extends FormRequest
{
    public function rules(): array
    {
        return [
            'filters' => [
                'nullable',
                'array',
            ],
            'limit' => [
                'nullable',
                'integer',
            ],
            'page' => [
                'nullable',
                'integer',
            ],
        ];
    }
}
