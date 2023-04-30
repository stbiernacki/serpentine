<?php

namespace App\Domain\StarWars\Providers;

use App\Infrastructure\Abstracts\ApiServiceProvider;
use App\Infrastructure\Traits\DomainResolve;
use Illuminate\Routing\Router;

/**
 * Class RouteServiceProvider
 * @package App\Domain\StarWars\Providers
 */
class RouteServiceProvider extends ApiServiceProvider
{
    use DomainResolve;

    /**
     * @param Router $router
     */
    public function map(Router $router): void
    {
        $this->mapPeopleRoutes($router);
    }

    /**
     * @param Router $router
     */
    public function mapPeopleRoutes(Router $router)
    {
        $router
            ->prefix('api/people')
            ->group($this->domainPath('Routes/people.php'));
    }
}
