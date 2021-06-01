<?php


namespace App\Domain\Setting\Providers;


use App\Infrastructure\Abstracts\ApiServiceProvider;
use App\Infrastructure\Traits\DomainResolve;
use Illuminate\Routing\Router;

/**
 * Class RouteServiceProvider
 * @package App\Domain\User\Providers
 */
class RouteServiceProvider extends ApiServiceProvider
{
    use DomainResolve;

    /**
     * @param Router $router
     */
    public function map(Router $router): void
    {
        $this->mapSettingRoutes($router);
    }

    /**
     * @param Router $router
     */
    public function mapSettingRoutes(Router $router)
    {
        $router
            ->prefix('api/setting')
            ->group($this->domainPath('Routes/setting.php'));
    }
}
