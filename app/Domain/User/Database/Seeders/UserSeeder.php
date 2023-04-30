<?php


namespace App\Domain\User\Database\Seeders;


use App\Domain\User\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class UserSeeder
 * @package App\Domain\User\Database\Seeders
 */
class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        if (Schema::hasTable('users')) {
            DB::table('users')->truncate();
        }
        Schema::enableForeignKeyConstraints();
        User::factory(1)->create();
    }
}
