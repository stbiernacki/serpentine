<?php


namespace App\Domain\Setting\Entities;


use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Setting
 * @package App\Domain\Setting\Entities
 */
class Setting extends Model implements Transformable
{
    use TransformableTrait;
}
