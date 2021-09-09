@extends('layouts.auth')

@section('title')
    Kekraf - Login
@endsection

@section('content')
    <div class="page-content page-auth">
      <!-- login -->
      <section class="kekraf-login" data-aos="fade-up">
        <div class="container">
          <div class="row row-login">
            <div class="col-md-6 ">
              <img
                src="images/login-placeholder.jpg"
                alt=""
                class="align-content-center w-100"
              />
            </div>
            <div class="col-md-6">
              <h5>Masuk ke akun anda</h5>
              <form action="" class="mt-3">
                <div class="form-group">
                  <label for="">Email</label>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                  />
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                  />
                </div>
                <div class="row btn-auth-login">
                  <div class="col-lg-6">
                    <a
                      href="{{ route('dashboard') }}"
                      class="btn btn-primary btn-block p-2"
                      >Masuk</a
                    >
                  </div>
                  <div class="col-lg-6">
                    <a href="{{ route('register') }}" class="btn btn-register btn-block"
                      >Daftar</a
                    >
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- tutup login -->
    </div>
<div class="container" style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
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
