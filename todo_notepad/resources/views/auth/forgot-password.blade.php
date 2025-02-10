<x-guest-layout>
    <div class="mb-4 text-md text-white dark:text-gray-400" style="text-align: center;">
        {{ __('forgotten_password.e_message') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('forgotten_password.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-start mt-4">
            <x-primary-button>
                {{ __('forgotten_password.send',) }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
