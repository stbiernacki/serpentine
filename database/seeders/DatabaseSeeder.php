<?php

namespace Database\Seeders;

use App\Domain\Category\Database\Seeders\CategorySeeders;
use App\Domain\User\Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeders::class);
    }
}
