@extends('layouts.login_layout')
@section('content')

<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3">
              <div class="card-body">
                <div class="text-center mt-4 mb-0">
                    <a href="{{route('dashboard')}}" class="logo">
                      <img src="{{ asset('img/logo_mec.png')}}" alt="">
                    </a>
                  </div><!-- End Logo -->

                <div class="pt-2 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                  <p class="text-center small">Bimbel Millenial Education Center</p>
                </div>

                <form class="row g-3 needs-validation" action="{{ route('proses_login') }}" method="POST" novalidate>
                  @csrf
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Nama</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourUsername" value="{{ old('name') }}" required>
                      <div class="invalid-feedback">
                        Please enter your username.
                      </div>

                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                    <div class="invalid-feedback">
                      Please enter your password!
                    </div>
                  </div>

                  @if ($errors->has('login_gagal'))
                    <div class="col-12">
                      <div class="alert alert-danger">
                        {{ $errors->first('login_gagal') }}
                      </div>
                    </div>
                  @endif

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
</main><!-- End #main -->

@endsection
