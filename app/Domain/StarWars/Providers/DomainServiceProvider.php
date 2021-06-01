<?php


namespace App\Domain\StarWars\Providers;


use App\Infrastructure\Abstracts\ServiceProvider;

/**
 * Class DomainServiceProvider
 * @package App\Domain\StarWars\Providers
 */
class DomainServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $alias = 'people';

    /**
     * @var bool
     */
    protected $hasMigrations = true;

    /**
     * @var bool
     */
    protected $hasViews = false;

    /**
     * @var array
     */
    protected $providers = [
        RepositoryServiceProvider::class,
        RouteServiceProvider::class,
    ];
}
