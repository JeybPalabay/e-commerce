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

        input[type="text"], input[type="email"], input[type="password"] {
            background-color: #1F222A;
            border: 1px solid #444;
            color: #E4E4E7;
            padding: 0.75rem;
            border-radius: 8px;
        }

        input::placeholder {
            color: #A1A1AA;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
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

        .terms-link {
            text-decoration: underline;
            color: #A1A1AA;
        }
    </style>

    <div class="auth-card">
        <div class="logo-wrapper">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-24 h-24">
        </div>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="firstname" value="{{ __('Firstname') }}" />
                <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            </div>

            <div class="mt-4">
                <x-label for="middlename" value="{{ __('Middlename') }}" />
                <x-input id="middlename" class="block mt-1 w-full" type="text" name="middlename" :value="old('middlename')" required autofocus autocomplete="middlename" />
            </div>

            <div class="mt-4">
                <x-label for="lastname" value="{{ __('Lastname') }}" />
                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="terms-link">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="terms-link">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4 btn-custom">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>
