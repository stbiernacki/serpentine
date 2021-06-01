<?php


namespace App\Domain\Setting\Providers;


use App\Domain\Setting\Console\Commands\CarrieOutBasicCommands;
use App\Infrastructure\Abstracts\ServiceProvider;

/**
 * Class DomainServiceProvider
 * @package App\Domain\Setting\Providers
 */
class DomainServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $hasCommands = true;

    /**
     * @var bool
     */
    protected $hasMigrations = false;

    /**
     * @var array
     */
    protected $providers = [
        RouteServiceProvider::class
    ];

    /**
     * @var array
     */
    protected $commands = [
        CarrieOutBasicCommands::class,
    ];
}
