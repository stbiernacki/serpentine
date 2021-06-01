<?php


namespace App\Domain\User\Criteria;


use App\Domain\User\Entities\User;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class UserCriteria
 * @package App\Domain\User\Criteria
 */
class UserCriteria implements CriteriaInterface
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserCriteria constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('name', $this->user->name);
    }
}
