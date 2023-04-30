<?php

namespace App\Infrastructure\Abstracts;

use App\Infrastructure\Traits\CreatesApplication;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase
 * @package App\Infrastructure\Abstracts
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
