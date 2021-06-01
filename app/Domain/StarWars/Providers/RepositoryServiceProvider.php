<?php


namespace App\Domain\StarWars\Providers;


use App\Domain\StarWars\Contracts\PeopleRepository;
use App\Domain\StarWars\Repositories\PeopleRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Domain\StarWars\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PeopleRepository::class, PeopleRepositoryEloquent::class);
    }

    /**
     * @return string[]
     */
    public function providers(): array
    {
        return [
            PeopleRepository::class,
        ];
    }
}
