<x-guest-layout>
    <x-auth-card>

        <div class="text-center mb-4 mt-3">
            <span><img src="themes/adminTpl/assets\images\logo-dark.png" alt="" width="150px" height="30"></span>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="username">Name</label>
                <input class="block mt-1 w-full" type="text" id="name" name="name" required autofocus placeholder="Michael Zenaty">
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input class="block mt-1 w-full" type="email" id="email" name="email" required="" placeholder="test@gmail.com">
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" id="password">
                </div>
            </div>
            <!-- Confirm Password -->
            <div class="mt-4">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="block mt-1 w-full" id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
