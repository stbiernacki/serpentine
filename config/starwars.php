<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Base Url Of The Star Wars API
    |--------------------------------------------------------------------------
    |
    | This value is the base url all the Star Wars data from seven Star Wars films.
    |
    */

    'base_url' => env('STAR_WARS_BASE_URL', 'https://swapi.dev/api/'),

    /*
    |--------------------------------------------------------------------------
    | Number Of Pages
    |--------------------------------------------------------------------------
    |
    | This value is the number of pages that will be downloaded from the api,
    | one page has 10 items, the last page may have fewer than 10 items.
    | If the given number of pages is greater, all existing items will be downloaded
    |
    */

    'pages' => env('STAR_WARS_PAGES', 5),
];
