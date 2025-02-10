<x-guest-layout>
    <div class="mb-4 text-sm text-white dark:text-white">
        {{ __('email_verification.link') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-white dark:text-white">
            {{ __('email_verification.resend') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('email_verification.resend_btn') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-primary-button type="submit" class="underline text-lg text-white dark:text-white hover:text-blue dark:hover:text-green-500 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-200 dark:focus:ring-offset-green-200">
                {{ __('email_verification.logout') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
