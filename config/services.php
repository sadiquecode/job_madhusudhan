<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'currency' => env('STRIPE_CURRENCY'),
        'currency_smallest_unit' => env('STRIPE_CURRENCY_SMALLEST_UNIT'),
    ],

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    'facebook' => [
        'client_id' => config('services.facebook.client_id', ''),
        'client_secret' => config('services.facebook.client_secret', ''),
        'redirect' => config('services.facebook.redirect', ''),
    ],

    'google' => [
        'client_id' => config('services.google.client_id', ''),
        'client_secret' => config('services.google.client_secret', ''),
        'redirect' => config('services.google.redirect', ''),
    ],
    
    'paypal' => [
    'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
    'secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET'),
    // Other PayPal configuration options
    ],


];
