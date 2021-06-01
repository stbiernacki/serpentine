<?php


namespace App\Domain\User\Repositories;


use App\Domain\User\Contracts\UserRepository;
use App\Domain\User\Entities\User;
use App\Infrastructure\Abstracts\BaseRepositoryEloquent;

/**
 * Class UserRepositoryEloquent
 * @package App\Domain\User\Repositories
 */
class UserRepositoryEloquent extends BaseRepositoryEloquent implements UserRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }
}
