<?php

use App\Domain\StarWars\Http\Controllers\PeopleController;

Route::get('/all', [PeopleController::class, 'all']);
//Route::get('/create', [PeopleController::class, 'create']);
