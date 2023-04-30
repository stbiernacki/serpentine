<?php


namespace App\Domain\User\Providers;


use App\Domain\User\Contracts\UserRepository;
use App\Domain\User\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package App\Domain\User\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
    }

    /**
     * @return string[]
     */
    public function providers(): array
    {
        return [
            UserRepository::class,
        ];
    }
}
