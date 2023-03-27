<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PhoneNumberVerify extends Component
{
    public $code;

    public function mount()
    {
        dd('I got here');
    }

    public function sendCode()
    {
        // $twilio = resolve('TwilioClient');
        // $verification = $twilio
        //     ->verify
        //     ->v2
        //     ->services(getenv('TWILIO_VERIFICATION_SID'))
        //     ->verifications
        //     ->create('+1' . str_replace('-', '', $this->phone_number), "sms");

        // $this->status = $verification->status;
        // dd($this->status);
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $verification = $twilio->verify->v2->services("VAXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
            ->verifications
            ->create("+15017122661", "sms");

        dd($verification->status);
    }

    public function verifyCode()
    {
    }

    public function render()
    {
        return view('livewire.phone-number-verify');
    }
}
