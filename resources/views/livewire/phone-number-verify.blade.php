
<div class="max-4xl mx-auto px-8 mt-20 md:px-24">
    <x-auth-session-status class="mb-4" :status="session('message')" />
    <div class="bg-gray-200 p-10">
        <form wire:submit.prevent="verifyCode">
    
            <!-- Enter Verification code-->
            <div>
                <x-input-label for="code" :value="__('Enter code')" />
                <x-text-input wire:model="code" type="number" class="block mt-1 w-full"  required autofocus />
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
    
                <x-primary-button class="ml-3" type="submit">
                    {{ __('Verify code test') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</div>
