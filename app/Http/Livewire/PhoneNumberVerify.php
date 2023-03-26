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

    public function resendCode()
    {
    }

    public function verifyCode()
    {
    }

    public function render()
    {
        return view('livewire.phone-number-verify');
    }
}
