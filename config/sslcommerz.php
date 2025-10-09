<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SSLCommerz Store Settings
    |--------------------------------------------------------------------------
    */
    'store_id' => env('rashe68e5fba554ff8', 'testbox'),
    'store_password' => env('rashe68e5fba554ff8@ssl', 'qwerty'),
    'mode' => env('SSLCZ_MODE', 'sandbox'), // sandbox or live

    /*
    |--------------------------------------------------------------------------
    | SSLCommerz API URLs
    |--------------------------------------------------------------------------
    */
    'api_url' => [
        'sandbox' => 'https://sandbox.sslcommerz.com/gwprocess/v4/api.php',
        'live' => 'https://securepay.sslcommerz.com/gwprocess/v4/api.php',
    ],

    'redirect_urls' => [
        'success' => env('SSLCZ_SUCCESS_URL', '/ssl/success'),
        'fail' => env('SSLCZ_FAIL_URL', '/ssl/fail'),
        'cancel' => env('SSLCZ_CANCEL_URL', '/ssl/cancel'),
    ],
];
