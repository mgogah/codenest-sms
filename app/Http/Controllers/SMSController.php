<?php

namespace App\Http\Controllers;

use App\Jobs\SendSMS;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'message' => 'required|string',
            'provider' => 'required|string',
        ]);

        $smsData = $request->only(['phone_number', 'message', 'provider']);

        // Dispatch job to send SMS
        SendSMS::dispatch($smsData);

        return back()->with('status', 'SMS is being sent.');
    }
}
