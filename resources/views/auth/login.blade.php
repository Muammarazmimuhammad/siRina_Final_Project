<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        body {
            background: linear-gradient(135deg, #e0f2fe 0%, #dbeafe 100%);
        }

        .login-container {
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-card {
            display: grid;
            grid-template-columns: 1fr;
            width: 100%;
            max-width: 900px;
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            animation: fadeIn 0.7s ease-out forwards;
        }

        @media (min-width: 768px) {
            .login-card {
                grid-template-columns: 4fr 5fr;
            }
        }

        .login-branding {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2.5rem;
            background: linear-gradient(165deg, #1e3a8a 0%, #2563eb 100%);
            color: #ffffff;
            text-align: center;
        }
        
        .login-logo {
            width: 120px;
            height: auto;
            margin-bottom: 1.5rem;
        }

        .login-branding h1 {
            font-size: 1.875rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .login-branding p {
            font-size: 1rem;
            color: #dbeafe;
        }

        .login-form-panel {
            padding: 2.5rem;
        }
        
        .login-form-panel h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .login-form-panel .subtitle {
            color: #64748b;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="login-container">
        <div class="login-card">
            <div class="login-branding">
                <img src="{{ asset('images/sirina_logo.png') }}" alt="SiRina Logo" class="login-logo">
                <h1>Selamat Datang</h1>
                <p>Sistem Informasi Ruangan & Inventaris</p>
            </div>

            <div class="login-form-panel">
                <h2>Login Akun</h2>
                <p class="subtitle">Silakan masuk untuk melanjutkan.</p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif

                        <x-primary-button class="ms-3">
                            Log in
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>