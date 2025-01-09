@extends('layouts.app')

@section('content')
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">

             <!-- Flash Messages -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <!-- Contact form-->
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-lock-fill"></i>
                    </div>
                    <h1 class="fw-bolder">Login</h1>
                    <p class="lead fw-normal text-muted mb-0"></p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">

                        {{-- <form id="contactForm" data-sb-form-api-token="API_TOKEN"> --}}
                        <form method="POST" action="{{url('_login')}}">
                            @csrf
                            <!-- UserName input-->
                            <div class="form-floating mb-3">
                                <input 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                type="email" 
                                value="{{ old('email', request()->cookie('email')) }}" 
                                placeholder="Enter your email" 
                                required 
                                autofocus 
                            />
                            <label for="email">Email</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Password input-->
                            <div class="form-floating mb-3">
                                <input 
                                class="form-control" 
                                id="password" 
                                name="password" 
                                type="password" 
                                placeholder="Enter your password" 
                                required 
                                />
                                <label for="password">Password</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                           
                            <div class="form-floating mb-3">
                                 <!-- Remember Me -->
                                <div class="form-check mb-3">
                                    <input 
                                    type="checkbox" 
                                    id="remember" 
                                    name="remember" 
                                    {{ old('remember', request()->cookie('remember') ? 'checked' : '') }}
                                />
                                <label for="remember">Remember Me</label>
                                </div>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                              
                            </div>
                        </form>

                        <div class="d-grid mt-3">
                            <a href="{{ route('google-auth') }}" class="btn btn-danger">
                                <i class="bi bi-google"></i> Login with Google
                            </a>
                        </div>
                        
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection