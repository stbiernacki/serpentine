<?php

declare(strict_types=1);

namespace App\Domain\Category\Providers;

use App\Infrastructure\Abstracts\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $alias = 'categories';

    /**
     * @var bool
     */
    protected $hasMigrations = true;

    /**
     * @var array
     */
    protected $providers = [
        RouteServiceProvider::class,
    ];
}
