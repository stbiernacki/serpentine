<?php

declare(strict_types=1);

namespace App\Domain\Category\Tests\Feature\Category;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Enums\CategoryLocaleEnum;
use App\Domain\Category\Tests\Feature\FeatureTestCase;
use Illuminate\Http\Response;

class CategoryControllerIndexTest extends FeatureTestCase
{
    public function testIndex(): void
    {
        $this->categories(); //__ Two categories have been created for each locale

        $response = $this->getJson(route(
            'categories.index',
            [
                'filters[locale]' => (string) CategoryLocaleEnum::DE(),
            ]
        ));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'type',
                    'name',
                    'locale',
                ]
            ]
        ]);
        $response->assertJsonCount(2, 'data');
    }

    public function testIndexForUnprocessableEntity(): void
    {
        $this->categories();

        $response = $this->getJson(route('categories.index'));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors([
            'filters.locale'
        ]);
    }

    private function categories(): void
    {
        collect(CategoryLocaleEnum::toArray())->each(
            fn(string $locale) => Category::factory([
                'locale' => $locale,
            ])
                ->count(2)
                ->create()
        );
    }
}
