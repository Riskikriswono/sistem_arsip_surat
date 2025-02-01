@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-5 mt-5">
            <div class="card mt-5">
                <div class="card-header text-center">{{ __(' Halaman Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-9">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                </div>
            </div>
        </div> --}}

        <div class="row mb-0 ">
            <div class="offset-md-6">
                <button type="submit" class="btn btn-primary col-2">
                    {{ __('Login') }} <i class="fa-regular fa-arrow-right-to-arc"></i>
                </button>

                @if (Route::has('password.request'))
                {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
                </a> --}}
                @endif
            </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection
