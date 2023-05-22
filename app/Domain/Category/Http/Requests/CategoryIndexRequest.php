<?php

declare(strict_types=1);

namespace App\Domain\Category\Http\Requests;

use App\Domain\Category\Enums\CategoryLocaleEnum;
use App\Infrastructure\Requests\IndexRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class CategoryIndexRequest extends IndexRequest
{
    public function rules(): array
    {
        return [
            'filters.locale' => [
                'required',
                new EnumRule(CategoryLocaleEnum::class)
            ],
        ];
    }
}
