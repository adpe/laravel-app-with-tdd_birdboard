@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('password.email') }}"
          class="lg:w-1/2 lg:mx-auto bg-card py-12 px-16 rounded shadow">
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">{{ __('Reset Password') }}</h1>

        @if (session('status'))
            <div class="text-sm text-success mb-6" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="field mb-6">
            <label for="email" class="label uppercase text-xs block mb-2">{{ __('E-Mail Address') }}</label>
            <input id="email"
                   type="email"
                   class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   required autocomplete="email"
                   autofocus>

            @include ('errors')
        </div>

        <div class="field">
            <button type="submit" class="button">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>
@endsection
