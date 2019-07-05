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
    'elastic_email' => [
        'key' => env('ELASTIC_KEY'),
        'account' => env('ELASTIC_ACCOUNT')
    ],

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

    //for facebook
    'facebook' => [
        'client_id' => '215880509186110',         // Your  Client ID
        'client_secret' => '4ac25acc1fdd16c4adccd5d05a063b49', // Your  Client Secret
        'redirect' => 'https://www.dstreet.com.ng/login/facebook/callback',
    ],
    //for facebook


      //for twitter
      'twitter' => [
        'client_id' => 'JJekXkqhfd0JUcQH1DUwcWC3R',         // Your  Client ID
        'client_secret' => '9NQsn5TA3DgodxzWn3q4q80OjpM7eKC4sPVaMcBD2xBVI4cKy2', // Your  Client Secret
        'redirect' => 'http://127.0.0.1:8000/login/twitter/callback',
    ],
    //for twitter


     //for google
     'google' => [
        'client_id' => '636127319323-p1uiv6qauqk8jc0nt6ums4iifgjct51e.apps.googleusercontent.com',         // Your  Client ID
        'client_secret' => '9mWNFDDueMY2agI3ixImfnyU', // Your  Client Secret
        'redirect' => 'http://www.dstreet.com.ng/login/google/callback',
    ],
    //for twitter

];
