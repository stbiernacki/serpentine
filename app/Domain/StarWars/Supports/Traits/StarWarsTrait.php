<?php


namespace App\Domain\StarWars\Supports\Traits;


use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Http;

/**
 * Trait StarWarsTrait
 * @package App\Domain\StarWars\Supports\Traits
 */
trait StarWarsTrait
{
    /**
     * @return array
     */
    public function people(): array
    {
        $peoples = [];

        for ($page = 1; $page <= $this->getPages(); $page++) {
            $peoples = array_merge_recursive($peoples, $this->dataPortion($page));
        }
        return $peoples;
    }

    /**
     * @param int $page
     * @return mixed
     */
    private function dataPortion(int $page)
    {
        return Http::get(config('starwars.base_url') . "people?page={$page}")["results"];
    }


    /**
     * @return Repository|Application|int|mixed
     */
    private function getPages()
    {
        return config('starwars.pages') > 9 ? 9 : config('starwars.pages');
    }
}
