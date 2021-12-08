<x-guest-layout>
    <x-auth-card>
        <div class="text-center mb-4 mt-3">
            <span><img src="themes/adminTpl/assets\images\logo-dark.png" alt="" width="150px" height="30"></span>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

           <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
                <div class="form-group">
                    <label for="emailaddress">Email address</label>
                    <input class="block mt-1 w-full" type="email" id="email" name="email" required placeholder="john@deo.com">
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="block mt-1 w-full" type="password" required autocomplete="current-password" id="password" name="password" placeholder="Enter your password">
                </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-end mt-4">

            </div>
            <div class="flex items-center justify-end mt-4">
{{--                 khong co mk--}}
                @if (Route::has('register'))
                    <div class="col-sm-12 text-center">
                        <p class="text-muted mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-dark ml-1"><b>Sign Up</b></a></p>
                    </div>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
