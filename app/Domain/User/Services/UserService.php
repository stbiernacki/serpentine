<?php


namespace App\Domain\User\Services;


use App\Domain\User\Contracts\UserRepository;
use App\Infrastructure\Abstracts\ModelService;

/**
 * Class UserService
 * @package App\Domain\User\Services
 */
class UserService extends ModelService
{
    /**
     * @var UserRepository
     */
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return UserRepository
     */
    public function getRepository(): UserRepository
    {
        return $this->repository;
    }
}
