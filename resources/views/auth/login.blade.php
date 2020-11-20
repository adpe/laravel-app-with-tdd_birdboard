@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}"
          class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow">
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">{{ __('Login') }}</h1>

        <div class="field mb-6">
            <label for="email" class="label uppercase text-grey text-xs block mb-2">{{ __('E-Mail Address') }}</label>

            <div class="control">
                <input id="email"
                       type="email"
                       class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email"
                       autofocus>
            </div>
        </div>

        <div class="field mb-6">
            <label for="password" class="label uppercase text-grey text-xs block mb-2">{{ __('Password') }}</label>

            <div class="control">
                <input id="password"
                       type="password"
                       class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full @error('password') is-invalid @enderror"
                       name="password"
                       required
                       autocomplete="current-password">
            </div>
        </div>

        <div class="field mb-6">
            <div class="control">
                <input class="form-check-input"
                       type="checkbox"
                       name="remember"
                       id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="text-sm" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="field">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="button mr-2">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="text-grey text-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection
