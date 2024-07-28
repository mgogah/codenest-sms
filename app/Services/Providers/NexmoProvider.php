<?php
namespace App\Services\Providers;

use Nexmo\Client;

class NexmoProvider
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(new \Nexmo\Client\Credentials\Basic(config('sms.nexmo.key'), config('sms.nexmo.secret')));
    }

    public function send($phoneNumber, $message)
    {
        $this->client->message()->send([
            'to' => $phoneNumber,
            'from' => config('sms.nexmo.from'),
            'text' => $message,
        ]);
    }
}
