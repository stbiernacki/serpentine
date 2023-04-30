<?php


namespace App\Infrastructure\Abstracts;


use App\Infrastructure\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class BaseRepositoryEloquent
 * @package App\Infrastructure\Abstracts
 */
abstract class BaseRepositoryEloquent extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * @param array $data
     * @return Model
     * @throws BindingResolutionException
     */
    public function make(array $data): Model
    {
        $model = $this->app->make($this->model());
        $model->fill($data);

        return $model;
    }
}
