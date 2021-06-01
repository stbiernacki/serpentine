<?php


namespace App\Infrastructure\Contracts;


use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BaseRepositoryInterface
 * @package App\Infrastructure\Contracts
 */
interface BaseRepositoryInterface extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function model();

    /**
     * @param array $data
     * @return Model
     */
    public function make(array $data): Model;
}
