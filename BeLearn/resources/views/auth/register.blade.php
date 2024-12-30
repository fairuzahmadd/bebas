@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 d-flex shadow rounded overflow-hidden">
                <!-- Logo Section -->
                <div class="col-6 bg-white text-center text-white d-flex flex-column align-items-center justify-content-center py-5">
                    <img src="{{ asset('images/Logo BeLearn 1.png') }}" alt="BeLearn Logo" class="mb-4" style="width: 300px; height: 300px;">
                    <h1 class="h4 fw-bold text-black">BeLearn</h1>
                    <p class="small text-black">Be Learning Together</p>
                </div>
                <!-- Register Form Section -->
                <div class="col-6 bg-white p-5">
                    <h2 class="h5 fw-bold mb-4 text-dark">Hello!</h2>
                    <p class="mb-4 text-muted">Silakan Daftar Untuk Memulai!</p>

                    <!-- Flash Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Registration Failed!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Registration Successful!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Register</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-muted text-decoration-none">I already have account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
