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
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID', '479110156262084'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET', 'e6bb08f7236932666028534680f6f0c0'),
        'redirect' => env('FACEBOOK_CALLBACK_URL', 'https://wood-grove.speralabs.com/login/facebook/callback'),
    ],

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID', '587043927752-5epa0clju4eqfhit7jq44p6gmsdlkdmv.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET', 'doiKMjQG_Yj9z9yEhFhNT6ds'),
        'redirect'      => env('GOOGLE_REDIRECT', 'https://wood-grove.speralabs.com/login/google/callback')
    ],

    'azure' => [
        'client_id' => env('AZURE_KEY', 'dd4be5b3-a355-41c9-ae51-7f11f410d7eb'),
        'client_secret' => env('AZURE_SECRET', 'g4AxVJ**/@Mywuz0fqXZ0SADcMalrLC7'),
        'tenant' => env('AZURE_TENANT', 'e641cd52-98e6-429c-92b7-07442a6a40bc'),
        'redirect' => env('AZURE_REDIRECT_URI', 'https://wood-grove.speralabs.com/login/azure/callback')
    ],
];
