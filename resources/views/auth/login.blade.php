<x-guest-layout>
    <style>
        body {
            background-color: #E4E4E7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .auth-card {
            max-width: 480px;
            margin: 4rem auto;
            background-color: #2A2D36;
            border-radius: 12px;
            padding: 3rem 2.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            color: #E4E4E7;
        }

        input[type="email"], input[type="password"] {
            background-color: #1F222A;
            border: 1px solid #444;
            color: #E4E4E7;
            padding: 0.75rem;
            border-radius: 8px;
        }

        input::placeholder {
            color: #A1A1AA;
        }

        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #6366F1;
            outline: none;
            box-shadow: 0 0 0 2px #6366F1;
        }

        .auth-card label,
        .auth-card label.text-sm {
            color: #A1A1AA !important;
            font-weight: 600;
            font-size: 0.80rem;
        }

        .text-sm.text-gray-600 {
            color: #A1A1AA;
        }

        .btn-custom {
            background-color: #4F46E5;
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-custom:hover {
            background-color: #6366F1;
        }

        .font-medium.text-sm.text-green-600 {
            color: #22C55E;
        }

        .logo-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
    </style>

    <div class="auth-card">
        <div class="logo-wrapper">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-24 h-24">
        </div>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Enter your email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-3">
                <div class="flex gap-3">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-indigo-400" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="flex gap-3">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn-custom">
                            {{ __('Register') }}
                        </a>
                    @endif

                    <button type="submit" class="btn-custom">
                        {{ __('Log in') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
