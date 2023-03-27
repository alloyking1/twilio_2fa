<x-guest-layout>
    <!-- Session Status -->
    {{-- @if (session()->has('message'))
            <div class="bg-green-500 text-white max-w-md rounded-sm shadow-sm">
                <p>{{ session('message') }}</p>
            </div>
        @endif --}}
    <x-auth-session-status class="mb-4" :status="session('message')" />

    <form>
        @csrf
        
        <!-- Verification code-->
        <div>
            <x-input-label for="code" :value="__('Enter code')" />
            <x-text-input id="code" class="block mt-1 w-full" type="number" name="code"  required autofocus />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>


        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-3" type="button">
                {{ __('Verify code test') }}
            </x-primary-button>
        </div>
    </form>
    {{-- <x-primary-button class="ml-3">
        {{ __('Re-send code') }}
    </x-primary-button> --}}
</x-guest-layout>
