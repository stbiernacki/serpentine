<?php

use App\Domain\Setting\Http\Controllers\SettingController;

Route::get('/get', [SettingController::class, 'get']);
