@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 d-flex shadow rounded overflow-hidden">
                <!-- Logo Section -->
                <div class="col-6 bg-secondary text-center text-white d-flex flex-column align-items-center justify-content-center py-5">
                    <img src="{{ asset('images/Logo BeLearn 1.png') }}" alt="BeLearn Logo" class="mb-4" style="width: 300px; height: 300px;">
                    <h1 class="h4 fw-bold">BeLearn</h1>
                    <p class="small">Be Learning Together</p>
                </div>
                <!-- Login Form Section -->
                <div class="col-6 bg-white p-5">
                    <h2 class="h5 fw-bold mb-4 text-dark">Hello Again!</h2>
                    <p class="mb-4 text-muted">Selamat Datang Kembali</p>

                    <!-- Flash Message for Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Login Gagal!</strong> Pastikan email dan password Anda benar.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="text-muted text-decoration-none">Register?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
