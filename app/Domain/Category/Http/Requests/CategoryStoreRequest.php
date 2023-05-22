<?php

declare(strict_types=1);

namespace App\Domain\Category\Http\Requests;

use App\Domain\Category\Enums\CategoryLocaleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\Enum\Laravel\Rules\EnumRule;

class CategoryStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => [
                'string',
                'nullable',
                'min:3'
            ],
            'locale' => [
                'required',
                new EnumRule(CategoryLocaleEnum::class)
            ],
            'name' => [
                'string',
                'required',
                'min:3'
            ]
        ];
    }
}
