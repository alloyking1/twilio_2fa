<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Twilio\Rest\Client;


class PhoneNumberVerify extends Component
{
    public $code = null;
    public $error;

    public function mount()
    {
        // $this->sendCode();
    }

    public function sendCode()
    {
        try {
            // $twilio = $this->connect();
            // $verification = $twilio->verify->v2->services(getenv("TWILIO_VERIFICATION_SID"))
            //     ->verifications
            //     ->create("+2348063146940", "sms");
            true;
            session()->flash('message', 'OTP sent successfully');

            // dd($verification->status);
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        }
    }

    public function verifyCode()
    {
        dd($this->code);
        // $twilio = $this->connect();
        // try {
        //     $verification_check = $twilio
        //         ->verify
        //         ->v2
        //         ->services(getenv('TWILIO_VERIFICATION_SID'))
        //         ->verificationChecks
        //         ->create(
        //             $this->code, // code
        //             ["to" => '+1' . str_replace('-', '', $this->phone_number)]
        //         );
        // } catch (\Exception $e) {
        //     $this->error = $e->getMessage();
        // }

        // if ($verification_check->valid == false) {
        //     $this->error = 'That code is invalid, please try again.';
        // } else {
        //     $this->error = '';
        //     $this->status = $verification_check->status;
        // }
    }

    public function connect()
    {
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);
        return $twilio;
    }

    public function render()
    {
        return view('livewire.phone-number-verify');
    }
}
