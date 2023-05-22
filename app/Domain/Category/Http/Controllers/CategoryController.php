<?php

declare(strict_types=1);

namespace App\Domain\Category\Http\Controllers;

use App\Domain\Category\Events\CategoryDataCreatedSend;
use App\Domain\Category\Factories\CategoryFactory;
use App\Domain\Category\Http\QueryBuilders\CategoryQueryBuilder;
use App\Domain\Category\Http\Requests\CategoryIndexRequest;
use App\Domain\Category\Http\Requests\CategoryStoreRequest;
use App\Domain\Category\Repositories\CategoryRepository;
use App\Domain\Category\Transformers\CategoryTransformer;
use App\Interfaces\Http\Controllers\Controller;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryRepository $categoryRepository,
        private Dispatcher $dispatcher
    ) {
    }

    public function index(CategoryIndexRequest $request): JsonResponse
    {
        $paginator = (new CategoryQueryBuilder($this->categoryRepository))
            ->paginateFromRequest($request);

        return response()->json(
            fractal($paginator, new CategoryTransformer())
        );
    }

    public function store(CategoryStoreRequest $request): JsonResponse
    {
        $category = CategoryFactory::makeFromArray($request->validated());

        DB::transaction(function () use ($category) {
            $this->categoryRepository->save($category);
            $this->dispatcher->dispatch(new CategoryDataCreatedSend($category));
        });

        return response()->json(
            fractal($category, new CategoryTransformer())->toArray()
        );
    }
}
