<?php
namespace App\Services\Providers;

use Twilio\Rest\Client;

class TwilioProvider
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(config('sms.twilio.sid'), config('sms.twilio.token'));
    }

    public function send($phoneNumber, $message)
    {
        $this->client->messages->create($phoneNumber, [
            'from' => config('sms.twilio.from'),
            'body' => $message,
        ]);
    }
}
