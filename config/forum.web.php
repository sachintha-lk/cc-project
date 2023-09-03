<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable/disable
    |--------------------------------------------------------------------------
    |
    | Set to false if you want to effectively disable the frontend.
    |
    */

    'enable' => true,

    /*
    |--------------------------------------------------------------------------
    | Router
    |--------------------------------------------------------------------------
    |
    | Web router config.
    |
    */

    'router' => [
        'prefix' => '/forum',
        'as' => 'forum.',
        'namespace' => '\TeamTeaTime\Forum\Http\Controllers\Web',
        'middleware' => [
            'web',
            // TODO FIX THIS TO CHECK FOR AUTH
            'checkIfAccountIsActive',
            'auth:sanctum',
//            config('jetstream.auth_session'),
//            'verified',
            ],
        'auth_middleware' => ['auth'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Route Prefixes
    |--------------------------------------------------------------------------
    |
    | Prefixes to use for each model.
    |
    */

    'route_prefixes' => [
        'category' => 'c',
        'thread' => 't',
        'post' => 'p',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Category Color
    |--------------------------------------------------------------------------
    |
    | The default color to use when creating new categories.
    |
    */

    'default_category_color' => '#007bff',

    /*
    |--------------------------------------------------------------------------
    | Utility Class
    |--------------------------------------------------------------------------
    |
    | Here we specify the class to use for various web utility methods.
    | This is automatically aliased to 'Forum' for ease of use in views.
    |
    */

    'utility_class' => TeamTeaTime\Forum\Support\Web\Forum::class,

];
