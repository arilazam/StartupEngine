<?php

//Store a copy of the Google Analytics credentials file in local storage for fast access
$path = storage_path() . "/app/google/analytics-credentials.json";
if (!file_exists($path)){
    $url = config('analytics.credentials');
    $contents = file_get_contents($url);
    \Storage::disk('local')->put('/google/analytics-credentials.json', $contents);
}

return [

    /*
     * The view id of which you want to display data.
     */
    'view_id' => env('GOOGLE_ANALYTICS_VIEW_ID'),

    /*
     * Path to the client secret json file. Take a look at the README of this package
     * to learn how to get this file.
     */
    'service_account_credentials_json' => $path,

    /*
     * The amount of minutes the Google API responses will be cached.
     * If you set this to zero, the responses won't be cached at all.
     */
    'cache_lifetime_in_minutes' => 60 * 24,

    /*
     * Here you may configure the "store" that the underlying Google_Client will
     * use to store it's data.  You may also add extra parameters that will
     * be passed on setCacheConfig (see docs for google-api-php-client).
     *
     * Optional parameters: "lifetime", "prefix"
     */
    'cache' => [
        'store' => 'file',
    ],

    'credentials' => env('GOOGLE_ANALYTICS_CREDENTIALS'),
];