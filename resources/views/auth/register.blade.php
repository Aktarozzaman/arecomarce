{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
           

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div> 
            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('Address') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
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
    <title>AR Fashion</title>
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
            border-radius: 60px;
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
            background: #0d5ffd;
            color: #eff4ff;
        }

        .form .form-content .form-box input[type="submit"]:active {
            box-shadow: -5px -5px 15px rgb(255, 255, 255), 5px 5px 20px rgb(129 154 181 / 43%);
            color: #0d5ffd;
            background: #eff4ff;
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
            padding: 20px 60px 20px 60px;
            /**box-shadow: -5px -5px 15px rgb(255, 255, 255), 5px 5px 20px rgb(129 154 181 / 43%);***/
            box-shadow: 0 0 2px 2px #eff4ff, 8px 8px 10px 4px rgb(129, 154, 181, 0.43), -8px -8px 10px 4px rgb(255 255 255);
        }

        .CA {
            color: #0d5ffd;
            display: block;
            position: relative;
            text-decoration: none;
            text-align: center;
            margin-top: 32px;
            font-weight: 600;

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
        <h2>Signup page</h2>
        <div class="form">
            <x-jet-validation-errors class="mb-4" />
            <div class="form-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-box">
                        <label>Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Jhon">
                    </div>
                    <div class="form-box">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required  placeholder="email.com">
                    </div>
                    <div class="form-box">
                        <label>Phone Number</label>
                        <input type="number" name="phone" value="{{ old('phone') }}" required placeholder="01*********" autocomplete="phone" >
                    </div>
                    <div class="form-box">
                        <label>Address</label>
                        <input type="text" name="address" value="{{ old('address') }}" required placeholder="Abhaynagar,Jashore" autocomplete="address">
                    </div>
                    <div class="form-box">
                        <label>Password</label>
                        <input  type="password" name="password" required autocomplete="new-password"  placeholder="••••••••">
                    </div>
                    <div class="form-box">
                        <label>Confirm Password</label>
                        <input  type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                    </div>
                    <div class="form-box" style="margin-top: 30px;">
                        <input type="submit" name="submit" value="{{ __('Register') }}">
                    </div>
                    
                </form>
            </div>
            <a href="{{ url('login') }}" class="CA">Already Have an account.?</a>
        </div>

    </div>

</body>

</html>
