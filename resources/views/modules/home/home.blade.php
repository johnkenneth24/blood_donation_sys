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
    <section id="contact" class="container-fluid d-flex flex-wrap">
        <div class="col-md-5 d-flex flex-column align-items-center justify-content-center">
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
                        <i class="fas fa-envelope"> </i><span class="ms-3">rhu_irosindistrict@gmail.com</span>
                    </div>
                    <div class="info">
                        <i class="fas fa-map-marker-alt"> </i><span class="ms-3">Irosin Rural Health Unit, Irosin,
                            Sorsogon</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 d-flex justify-content-center align-items-center flex-column">
            <div class="card text-bg-danger mb-3" style="">
                <div class="card-body">
                    <h5 class="card-title">FILL OUT THIS FORM TO BE A DONOR</h5>
                    <p class="card-text">After you submit the form you need to go to the RHU for validation.</p>
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="example@email.com" required >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" id="" placeholder="Barangay, Municipality, Province">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Firt Name</label>
                            <input type="text" class="form-control" id="" placeholder="Juan">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="" placeholder="Dela">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="" placeholder="Cruz">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Blood Type</label>
                            <select class="form-select"> 
                                <option value="">--Please Select--</option> 
                                <option value="">A</option> 
                                <option value="">B</option> 
                                <option value="">O</option>
                              </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select"> 
                                <option value="">--Please Select--</option> 
                                <option value="">Male</option> 
                                <option value="">Female</option> 
                                <option value="">Prefer not to say</option>
                              </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Age</label>
                            <input type="number" class="form-control" id="">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Birthdate</label>
                            <input type="date" class="form-control" id="">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Mobile No.</label>
                            <input type="number" class="form-control" id="" placeholder="09123456789">
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    I gree to the terms and conditions.
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="col-md-12 btn btn-light">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
