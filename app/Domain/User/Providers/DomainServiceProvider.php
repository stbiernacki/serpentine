<?php


namespace App\Domain\User\Providers;


use App\Infrastructure\Abstracts\ServiceProvider;

/**
 * Class DomainServiceProvider
 * @package App\Domain\User\Providers
 */
class DomainServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $alias = 'user';

    /**
     * @var bool
     */
    protected $hasMigrations = true;

    /**
     * @var bool
     */
    protected $hasViews = true;

    /**
     * @var array
     */
    protected $providers = [
        RepositoryServiceProvider::class,
        RouteServiceProvider::class,
    ];
}
