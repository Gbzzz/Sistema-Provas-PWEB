<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            @php
                $email = session('email')
            @endphp

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email', $email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Nova senha')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirme sua nova senha')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Trocar senha') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
