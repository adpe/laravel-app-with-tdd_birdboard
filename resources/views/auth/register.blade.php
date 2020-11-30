@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}"
          class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow">
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">{{ __('Register') }}</h1>

        <div class="field mb-6">
            <label for="name" class="label uppercase text-xs block mb-2">{{ __('Name') }}</label>

            <div class="control">
                <input id="name"
                       type="text"
                       class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full @error('name') is-invalid @enderror"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       autocomplete="name"
                       autofocus>
            </div>
        </div>

        <div class="field mb-6">
            <label for="email" class="label uppercase text-xs block mb-2">{{ __('E-Mail Address') }}</label>

            <div class="control">
                <input id="email"
                       type="email"
                       class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full @error('email') is-invalid @enderror"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autocomplete="email">
            </div>
        </div>

        <div class="field mb-6">
            <label for="password" class="label uppercase text-xs block mb-2">{{ __('Password') }}</label>

            <div class="control">
                <input id="password"
                       type="password"
                       class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full @error('password') is-invalid @enderror"
                       name="password"
                       required
                       autocomplete="new-password">
            </div>
        </div>

        <div class="field mb-6">
            <label for="password-confirmation" class="label uppercase text-xs block mb-2">{{ __('Confirm Password') }}</label>

            <div class="control">
                <input id="password-confirmation"
                       type="password"
                       class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full"
                       name="password_confirmation"
                       required
                       autocomplete="new-password">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
@endsection
