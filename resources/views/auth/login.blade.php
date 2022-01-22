@extends('master.index')

@section('headerScript')
    <style>
        body,html {
            background-image: url({{asset('/images/background.jpg')}});
            height: 100%;
        }

        #profile-img {
            height:180px;
        }
        .h-80 {
            height: 80% !important;
        }
    </style>
@endsection

@section('content')
    <div class="container h-80 pt-5">
        <div class="row align-items-center h-100">
            <div class="col-5 mx-auto">
                <div class="text-center">
                    <img id="profile-img" class="rounded-circle profile-img-card" src="{{asset('/images/login.png')}}" />
                    <p id="profile-name" class="profile-name-card"></p>
                    <form method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-light">{{ __('نام کاربری:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-light">{{ __('رمز عبور:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ورود') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-light" href="{{ route('password.request') }}">
                                        {{ __('رمز خود را فراموش کردید؟') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
