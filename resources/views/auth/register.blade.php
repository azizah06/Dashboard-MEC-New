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
                  <div class="">
                    <h5 class="card-title text-center pb-0 fs-4">Register</h5>
                    <p class="text-center small">Bimbel Millenial Education Center</p>
                  </div>

                  <form class="row g-3 needs-validation" action="{{ route('proses_register') }}" method="POST" novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nama </label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" value="{{ old('name') }}" required>
                      {{-- <div class="invalid-feedback">Please, enter your name!</div> --}}
                      @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" value="{{ old('email') }}" required>
                      {{-- <div class="invalid-feedback">Please enter a valid Email address!</div> --}}
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPasswordConfirmation" class="form-label">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" id="yourPasswordConfirmation" required>
                      <div class="invalid-feedback">Please confirm your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
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
