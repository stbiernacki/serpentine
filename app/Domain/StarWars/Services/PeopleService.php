<?php


namespace App\Domain\StarWars\Services;


use App\Domain\StarWars\Contracts\PeopleRepository;
use App\Domain\StarWars\Entities\People;
use App\Infrastructure\Abstracts\ModelService;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Class PeopleService
 * @package App\Domain\StarWars\Services
 */
class PeopleService extends ModelService
{
    /**
     * @var PeopleRepository
     */
    private $repository;

    /**
     * PeopleService constructor.
     * @param PeopleRepository $repository
     */
    public function __construct(PeopleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return PeopleRepository
     */
    public function getRepository(): PeopleRepository
    {
        return $this->repository;
    }

    /**
     * @param $data
     * @return EloquentModel|null
     */
    public function create($data): ?EloquentModel
    {
        /** @var People $people */
        $people = $this->getRepository()->updateOrCreate($data);
        return $people->fresh();
    }

}
