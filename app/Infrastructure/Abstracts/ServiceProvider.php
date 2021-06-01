<?php


namespace App\Infrastructure\Abstracts;


use App\Infrastructure\Traits\DomainResolve;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

/**
 * Class ServiceProvider
 * @package App\Infrastructure\Abstracts
 */
abstract class ServiceProvider extends IlluminateServiceProvider
{
    use DomainResolve;

    /**
     * @var string Alias for load translations and views
     */
    protected $alias;

    /**
     * @var bool Set true if will load migrations
     */
    protected $hasMigrations = false;

    /**
     * @var bool Set if will load commands
     */
    protected $hasCommands = false;

    /**
     * @var array List of custom Artisan commands
     */
    protected $commands = [];

    /**
     * @var array List of providers to load
     */
    protected $providers = [];

    /**
     * Register Domain ServiceProviders.
     */
    public function register(): void
    {
        collect($this->providers)->each(function ($providerClass) {
            $this->app->register($providerClass);
        });
    }

    public function boot(): void
    {
        $this->registerMigrations();
        $this->registerCommands();
    }

    /**
     * Register domain migration.
     */
    protected function registerMigrations(): void
    {
        if ($this->hasMigrations) {
            $this->loadMigrationsFrom($this->domainPath('Database/Migrations'));
        }
    }

    /**
     * Register domain custom Artisan commands.
     */
    protected function registerCommands(): void
    {
        if ($this->hasCommands) {
            $this->commands($this->commands);
        }
    }

}
