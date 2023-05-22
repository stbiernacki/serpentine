<?php

declare(strict_types=1);

namespace App\Domain\Category\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self PL()
 * @method static self EN()
 * @method static self DE()
 * @method static self FR()
 */
class CategoryLocaleEnum extends Enum
{
    public static function DEFAULT(): self
    {
        return self::PL();
    }
}
