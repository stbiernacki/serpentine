<?php


namespace App\Domain\Setting\Console\Commands;


use App\Domain\StarWars\Services\PeopleService;
use App\Domain\StarWars\Supports\Traits\StarWarsTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Class CarrieOutBasicCommands
 * @package App\Domain\Setting\Console\Commands
 */
class CarrieOutBasicCommands extends Command
{
    use StarWarsTrait;

    /**
     * @var string
     */
    protected $signature = 'run:app';

    /**
     * @var string
     */
    protected $description = 'carries out all the basic commands needed to run the application basically';

    /**
     * @var PeopleService
     */
    protected $peopleService;

    /**
     * CarrieOutBasicCommands constructor.
     * @param PeopleService $peopleService
     */
    public function __construct(PeopleService $peopleService)
    {
        parent::__construct();

        $this->peopleService = $peopleService;
    }


    public function handle(): void
    {
        $this->info('=-=-=-=-=-=-=-=-=-=-> check .env file');
        if (!file_exists('.env')) {
            echo `cp .env.example .env`;
            $this->call('key:generate');
        }
        $this->info('=-=-=-=-=-=-=-=-=-=-> check database.sqlite file');
        if (! file_exists('database/database.sqlite')) {
            echo `touch database/database.sqlite`;
        }

        $this->call('migrate:fresh');
        $this->call('db:seed');

        $this->info('=-=-=-=-=-=-=-=-=-=-> create people');
        Schema::disableForeignKeyConstraints();
        $this->truncateTable('people');
        Schema::enableForeignKeyConstraints();

        foreach ($this->people() as $person) {
            $this->peopleService->create($person);
            $this->info($person['name']);
        }

        $this->info('=-=-=-=-=-=-=-=-=-=-> check webpack-dev-server');
        $this->info('... it may take some time...');
        echo `npm install`;
        $this->info('... it may take some time...');
        echo `npm run dev`;
        $this->info('=-=-=-=-=-=-=-=-=-=-> conducting the test');
        $this->call('test');
        $this->info('=-=-=-=-=-=-=-=-=-=-> server');
        $this->call('serve');
    }

    /**
     * @param $table
     */
    private function truncateTable($table): void
    {
        if (Schema::hasTable($table)) {
            DB::table($table)->truncate();
        }
    }
}
