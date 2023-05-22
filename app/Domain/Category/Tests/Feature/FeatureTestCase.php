<?php

declare(strict_types=1);

namespace App\Domain\Category\Tests\Feature;

use App\Infrastructure\Abstracts\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class FeatureTestCase extends TestCase
{
    use RefreshDatabase;
}
