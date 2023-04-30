<?php


namespace App\Domain\StarWars\Repositories;


use App\Domain\StarWars\Contracts\PeopleRepository;
use App\Domain\StarWars\Entities\People;
use App\Infrastructure\Abstracts\BaseRepositoryEloquent;

/**
 * Class PeopleRepositoryEloquent
 * @package App\Domain\StarWars\Repositories
 */
class PeopleRepositoryEloquent extends BaseRepositoryEloquent implements PeopleRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return People::class;
    }
}
