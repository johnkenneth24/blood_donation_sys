@extends('layouts.app')

@section('title')
    Log In
@endsection

@section('content')
    <section id="login" class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row card-login d-flex justify-content-center align-items-center" id="authlog">
            <div class="card-auth">
                <div class="text-center">
                    <img src="{{ asset('images/blood-drop.png') }}" alt="logo" height="100px" class="text-center">
                </div>
                <h1 class="login-header">SIGN IN TO YOUR ACCOUNT</h1>
                <p class="text-center login-des">Only authorized personnel can log in!</p>
                <form action="{{ route('auth.verify') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Username" autofocus autocomplete="off" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-3">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-light mt-4 col-12">Log In</button>
                </form>
            </div>
        </div>
    </section>
@endsection
