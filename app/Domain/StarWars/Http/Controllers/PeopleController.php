<?php


namespace App\Domain\StarWars\Http\Controllers;


use App\Domain\StarWars\Http\Resources\PeopleResource;
use App\Domain\StarWars\Services\PeopleService;
use App\Domain\StarWars\Supports\Traits\StarWarsTrait;
use App\Interfaces\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class PeopleController
 * @package App\Domain\StarWars\Http\Controllers
 */
class PeopleController extends Controller
{
    use StarWarsTrait;

    /**
     * @var PeopleService
     */
    protected $peopleService;

    /**
     * PeopleController constructor.
     * @param PeopleService $peopleService
     */
    public function __construct(PeopleService $peopleService)
    {
        $this->peopleService = $peopleService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function all(): AnonymousResourceCollection
    {
       return PeopleResource::collection($this->peopleService->getRepository()->all());
    }
}
