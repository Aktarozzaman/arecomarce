{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800&display=swap');

        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            align-items: center;
            background: #eff4ff;
            display: flex;
            justify-content: center;
            min-height: 100vh;

        }

        .form {
            background: #eff4ff;
            border-radius: 40px;
            box-shadow: 5px 5px 8px rgb(129, 154, 181, 0.43), -6px -6px 10px rgb(255 255 255);
            padding: 20px 15px;
            position: relative;
            text-align: center;
            width: 320px;
        }


        .form .form-content {
            margin: 10px 15px;
            text-align: left;
        }

        .form .form-content .form-box {
            margin-top: 10px;
        }

        .form .form-content .form-box label {
            color: #0d5ffd;
            display: block;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form .form-content .form-box input {
            background: #eff4ff;
            border: none;
            border-radius: 50px;
            box-shadow: inset -2px -2px 6px rgb(59 59 59 / 18%), inset 2px 2px 6px rgb(129 154 181 / 43%);
            color: #0d5ffd;
            font-size: 18px;
            height: 45px;
            outline: none;
            padding: 5px 15px;
            width: 100%;
        }

        .form .form-content .form-box input:focus {
            box-shadow: -2px -2px 6px rgb(255 255 255),
                2px 2px 6px rgb(129 154 181 / 43%);

        }

        .form .form-content .form-box input[type="submit"] {
            box-shadow: -5px -5px 10px rgb(255, 255, 255), 5px 5px 10px rgb(129 154 181 / 43%);
            font-weight: 600;
            margin-top: 20px;
            border: 2px solid #0d5ffd;
        }

        .form .form-content .form-box input[type="submit"]:active {
            box-shadow: -5px -5px 15px rgb(255, 255, 255), 5px 5px 20px rgb(129 154 181 / 43%);
            color: #eff4ff;
            background: #0d5ffd;
            margin-top: 20px;
        }

        .form .form-content .form-box input::placeholder {
            color: #A2A2A2;
            font-size: 16px;
        }

        .form-forget {
            color: #0d5ffd;
            margin-top: 30px;
            font-weight: 600;
        }

        .form-forget a {
            color: #0d5ffd;
        }

        .formbx {
            position: relative;
            border-radius: 100px;
            background: #eff4ff;
            padding: 20px 30px 40px 30px;
            /**box-shadow: -5px -5px 15px rgb(255, 255, 255), 5px 5px 20px rgb(129 154 181 / 43%);***/
            box-shadow: 0 0 6px 6px #eff4ff, 8px 8px 10px 4px rgb(129, 154, 181, 0.43), -8px -8px 10px 4px rgb(255 255 255);
        }

        .CA {
            margin-left: 50px;
            padding: 11px;
            color: #eff4ff;
            display: block;
            font-weight: 600;
            font-size: 15px;
            position: relative;
            text-decoration: none;
            text-align: center;
            background: #0d5ffd;
            border-radius: 50px;
            margin-right: 50px;
            margin-top: 32px;
            box-shadow: -5px -5px 10px rgb(255, 255, 255), 5px 5px 10px rgb(129 154 181 / 43%);

        }

        .CA:active {
            box-shadow: -5px -5px 10px rgb(255, 255, 255), 5px 5px 10px rgb(129 154 181 / 43%);
            background: #eff4ff;
            color: #0d5ffd;

        }

        h2 {
            text-align: center;
            color: #0d5ffd;
            font-size: 25px;
            margin-bottom: 27px;
            margin-top: 27px;
        }
    </style>
</head>

<body>

    <div class="formbx">
        <h2>Login!</h2>
        <div class="form">
            <x-jet-validation-errors class="mb-4" />

            <div class="form-content">
                <form method="POST" action="{{ url('login') }}">
                    @csrf
                    <div class="form-box">
                        <label>Username</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="email@email.com">
                    </div>
                    <div class="form-box">
                        <label>Password</label>
                        <input type="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••">
                    </div>
                    <div class="form-box" style="margin-top: 30px;">
                        <input type="submit" name="submit" value="{{ __('Log in') }}">
                    </div>
                </form>
            </div>
            <a class="form-forget" href="{{ route('password.request') }}">Forget password?</a>
        </div>
        <a href="{{ url('register') }}" class="CA">Create Account</a>
    </div>

</body>

</html>
