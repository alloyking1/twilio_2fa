<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;


class PhoneNumberVerify extends Component
{
    public $code = null;
    public $error;

    public function mount()
    {
        $this->sendCode();
    }

    public function sendCode()
    {
        try {
            $twilio = $this->connect();
            $verification = $twilio->verify->v2->services(getenv("TWILIO_VERIFICATION_SID"))
                ->verifications
                ->create("+234" . str_replace('-', '', Auth::user()->phone_number), "sms");
            session()->flash('message', 'OTP sent successfully');
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        }
    }

    public function verifyCode()
    {
        $twilio = $this->connect();
        try {
            $verification_check = $twilio
                ->verify
                ->v2
                ->services(getenv('TWILIO_VERIFICATION_SID'))
                ->verificationChecks
                ->create(
                    [
                        "to" => "+234" . str_replace('-', '', Auth::user()->phone_number),
                        "code" => $this->code

                    ]
                );

            User::where('id', Auth::user()->id)->update([
                'phone_verified' => true
            ]);

            return redirect(route('dashboard'));
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        }

        if ($verification_check->valid == false) {
            $this->error = 'That code is invalid, please try again.';
            session()->flash('error', $this->error);
        } else {
            $this->error = '';
            $this->status = $verification_check->status;
        }
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
