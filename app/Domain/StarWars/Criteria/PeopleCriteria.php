<?php


namespace App\Domain\StarWars\Criteria;


use App\Domain\StarWars\Entities\People;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class PeopleCriteria
 * @package App\Domain\StarWars\Criteria
 */
class PeopleCriteria implements CriteriaInterface
{
    /**
     * @var People
     */
    protected $people;

    /**
     * StarWarsCriteria constructor.
     */
    public function __construct(People $people)
    {
        $this->people = $people;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        // TODO: Implement apply() method.
    }
}
