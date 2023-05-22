<?php

declare(strict_types=1);

namespace App\Domain\Category\Providers;

use App\Infrastructure\Abstracts\ApiServiceProvider;
use App\Infrastructure\Traits\DomainResolve;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ApiServiceProvider
{
    use DomainResolve;

    /**
     * @param Router $router
     */
    public function map(Router $router): void
    {
        $this->mapCategoryRoutes($router);
    }

    /**
     * @param Router $router
     */
    {
        $router
            ->prefix('api')
            ->group($this->domainPath('Routes/category.php'));
    }
}
