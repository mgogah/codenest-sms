<?php
namespace App\Jobs;

use App\Models\Message;
use App\Services\SMSFactory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $smsData;

    public function __construct($smsData)
    {
        $this->smsData = $smsData;
    }

    public function handle()
    {
        // Log the message attempt
        $message = Message::create([
            'phone_number' => $this->smsData['phone_number'],
            'message' => $this->smsData['message'],
            'provider' => $this->smsData['provider'],
            'status' => 'pending',
        ]);

        $smsProvider = SMSFactory::getProvider($this->smsData['provider']);

        try {
            $smsProvider->send($this->smsData['phone_number'], $this->smsData['message']);
            // Update the status to 'sent'
            $message->update(['status' => 'sent']);
        } catch (\Exception $e) {
            // Update the status to 'failed'
            $message->update(['status' => 'failed']);
        }
    }
}
