<?php
return [
    'twilio' => [
        'sid' => env('TWILIO_SID'),
        'token' => env('TWILIO_TOKEN'),
        'from' => env('TWILIO_FROM'),
    ],
    'nexmo' => [
        'key' => env('NEXMO_KEY'),
        'secret' => env('NEXMO_SECRET'),
        'from' => env('NEXMO_FROM'),
    ],
];
