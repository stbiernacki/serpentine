<?php

namespace App\Domain\Category\Tests\Feature\Category;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Enums\CategoryLocaleEnum;
use App\Domain\Category\Events\CategoryDataCreatedSend;
use App\Domain\Category\Tests\Feature\FeatureTestCase;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;

class CategoryControllerStoreTest extends FeatureTestCase
{
    public function testStore(): void
    {
        Event::fake();
        $data = [
            'type' => $type = 'type',
            'name' => $name = 'category name',
            'locale' => $locale = CategoryLocaleEnum::PL()
        ];

        $response = $this->postJson(
            uri: route('categories.store'),
            data: $data
        );

        $response->assertOk();
        $this->assertDatabaseHas(
            new Category(),
            [
                'id' => $response->json('data.id'),
                'type' => $type,
                'name' => $name,
                'locale' => $locale

            ]
        );
        Event::assertDispatched(CategoryDataCreatedSend::class);
    }

    public function testStoreForUnprocessableEntity(): void
    {
        $data = [
            'type' => 'a',
            'name' => 'bc',
            'locale' => 'IT'
        ];

        $response = $this->postJson(
            uri: route('categories.store'),
            data: $data
        );

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors([
            'type', 'locale', 'name'
        ]);
    }
}
