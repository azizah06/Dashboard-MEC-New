@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">Login to Your Account</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="form-label">Enter Your Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Enter Your Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                              <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                          </div>
                          <div class="form-group">
                                <li class="nav-item">
                                    <p class="small mb-0">Don't have account?<a class="nav-link" href="{{ route('register') }}"><p class="text-primary">create an account</p></a></p>
                                </li>
                          </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="bi bi-box-arrow-in-right"></i>Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
