<?php

declare(strict_types=1);

namespace App\Domain\Category\Database\Seeders;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Enums\CategoryLocaleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeders extends Seeder
{
    public function run(): void
    {
        if (Schema::hasTable('categories')) {
            DB::table('categories')->truncate();
        }

        collect(CategoryLocaleEnum::toArray())->each(
            fn (string $locale) => Category::factory([
                'locale' => $locale,
            ])
                ->count(2)
                ->create()

        );
    }
}
