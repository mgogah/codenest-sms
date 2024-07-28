<?php
namespace App\Services;

use App\Services\Providers\TwilioProvider;
use App\Services\Providers\NexmoProvider;

class SMSFactory
{
    public static function getProvider($provider)
    {
        switch ($provider) {
            case 'twilio':
                return new TwilioProvider();
            case 'nexmo':
                return new NexmoProvider();
            default:
                throw new \Exception('Invalid SMS provider');
        }
    }
}
