@extends('layouts.app')

@section('title')
    Welcome to BDMS!
@endsection

@section('content')
    <section id="landingHome" class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="text-landing">
                <h1 class="text-center">BLOOD <br> DONATION <br> MANAGEMENT <br> SYSTEM</h1>
                <blockquote class="text-center">"Let's Come to Donate Blood"</blockquote>
            </div>
        </div>
    </section>
    <section id="about" class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-6">
                <div class="image text-center">
                    <img src="{{ asset('image/about.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text">
                    <h1>WHY DONATING BLOOD IS IMPORTANT?</h1>
                    <p class="mt-4">
                        Blood is essential to help patients survive surgeries, cancer treatment, chronic illnesses, and
                        traumatic injuries. This lifesaving care starts with one person making a generous donation. The need
                        for blood is constant.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="blog" class="container-fluid d-flex justify-content-start align-items-center">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('image/about.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Blood Donation </h5>
                        <h6 class="card-subtitle mb-2 text-muted">admin | 01/01/2023</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>

                        <a href="">Read More...</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('image/about.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Blood Donation </h5>
                        <h6 class="card-subtitle mb-2 text-muted">admin | 01/01/2023</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>

                        <a href="">Read More...</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('image/about.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Blood Donation </h5>
                        <h6 class="card-subtitle mb-2 text-muted">admin | 01/01/2023</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>

                        <a href="">Read More...</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="container-fluid d-flex">
        <div class="col-md-5">
            <div class="des-contact">
                <h1>RHU IROSIN</h1>
                <p>Below are the contact information:</p>
            </div>
            <div class="contact row">
                <div class="contact-info">
                    <div class="info">
                        <i class="fas fa-phone"></i><span class="ms-3">0909-428-9335</span>
                    </div>
                    <div class="info">
                        <i class="fas fa-envelope"> </i><span class="ms-3">icahgloriane@gmail.com</span>
                    </div>
                    <div class="info">
                        <i class="fas fa-map-marker-alt"> </i><span class="ms-3">Jamorawon Bulan, Sorsogon</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">

        </div>
    </section>
@endsection
