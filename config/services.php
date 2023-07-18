<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
        'client_id' => '1042251526277-oa6hh5rfair1e3ov28piud00pavfapk2.apps.googleusercontent.com',         // Your GitHub Client ID
        'client_secret' => 'etx3uoaTL_h7ErnhkH7G_aKL', // Your GitHub Client Secret
        'redirect' => 'http://drdynamic.herokuapp.com/login/google/callback',
    ],
    'facebook' => [
        'client_id' => '1054390645044126',         // Your GitHub Client ID
        'client_secret' => '5023a0dd3924026f28d5eb728ea7c781', // Your GitHub Client Secret
        'redirect' => 'http://127.0.0.1:8000/login/facebook/callback',
    ],

];
