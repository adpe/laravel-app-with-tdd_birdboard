@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('password.update') }}"
          class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <h1 class="text-2xl font-normal mb-10 text-center">{{ __('Reset Password') }}</h1>

        <div class="field mb-6">
            <label for="email" class="label uppercase text-xs block mb-2">{{ __('E-Mail Address') }}</label>

            <input id="email"
                   type="email"
                   class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ $email ?? old('email') }}"
                   required
                   autocomplete="email"
                   autofocus>
        </div>

        <div class="field mb-6">
            <label for="password" class="label uppercase text-xs block mb-2">{{ __('Password') }}</label>

            <input id="password"
                   type="password"
                   class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full @error('password') is-invalid @enderror"
                   name="password"
                   required
                   autocomplete="new-password">
        </div>

        <div class="field mb-6">
            <label for="password-confirm"
                   class="label uppercase text-xs block mb-2">{{ __('Confirm Password') }}</label>
            <input id="password-confirm"
                   type="password"
                   class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                   name="password_confirmation"
                   required
                   autocomplete="new-password">
        </div>

        @include ('errors')

        <div class="field">
            <button type="submit" class="button">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
@endsection
