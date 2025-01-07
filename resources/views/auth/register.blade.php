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
                    <h1 class="fw-bolder">Register</h1>
                    <p class="lead fw-normal text-muted mb-0"></p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <form method="POST" action="{{ url('_register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                    type="text" value="{{ old('name') }}" placeholder="Full Name" required
                                    autocomplete="name" autofocus />
                                <label for="name">Full Name</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                    type="email" value="{{ old('email') }}" placeholder="Email" required
                                    autocomplete="email" />
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control @error('password') is-invalid @enderror" id="password"
                                    name="password" type="password" placeholder="Password" required />
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Confirmation input-->
                            <div class="form-floating mb-3">
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                    type="password" placeholder="Confirm your Password..." name="password_confirmation" required />
                                <label for="password_confirmation">Confirm Password</label>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact"
                                    type="text" value="{{ old('contact') }}" placeholder="Contact Number" required />
                                <label for="contact">Contact Number</label>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
