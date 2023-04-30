<?php


namespace App\Domain\Setting\Http\Controllers;


use App\Domain\StarWars\Services\PeopleService;
use App\Interfaces\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class SettingController
 * @package App\Domain\Setting\Http\Controllers
 */
class SettingController extends Controller
{
    /**
     * @var PeopleService
     */
    protected $peopleService;

    /**
     * SettingController constructor.
     * @param PeopleService $peopleService
     */
    public function __construct(PeopleService $peopleService)
    {
        $this->peopleService = $peopleService;
    }

    /**
     * @return JsonResponse
     */
    public function get(): JsonResponse
    {
        return response()->json([
            'people' => $this->peopleService->getRepository()->all(),
        ]);
    }
}
