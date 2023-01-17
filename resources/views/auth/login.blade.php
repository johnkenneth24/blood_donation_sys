@extends('layouts.app')

@section('title')
    Log In
@endsection

@section('content')
    <section id="login" class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row card-login d-flex justify-content-center align-items-center">
            <div class="card-auth">
                <h1 class="card-login-header">SIGN IN TO YOUR ACCOUNT</h1>
                <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="Username" aria-label="First name">
                </div>
                <div class="col-md-12 mt-3">
                    <input type="text" class="form-control" placeholder="Password" aria-label="Last name">
                </div>
                <button type="button" class="btn btn-outline-light mt-4 col-12">Log In</button>
            </div>
        </div>
    </section>
@endsection
