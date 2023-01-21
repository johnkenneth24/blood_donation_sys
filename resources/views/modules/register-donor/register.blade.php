<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="description" content="SK Management" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="url" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="shortcut icon" href="{{ asset('images/blood-alt.png') }}" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/5d19900f91.js"crossorigin="anonymous"></script>
</head>

<body id="landing">
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark">
        <div class="container-fluid ms-5 me-5">
            <a class="navbar-brand" href="#">
                <h1>Team<span>Dev.</span></h1>
            </a>
            <button class="navbar-toggler text-warning" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Back</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="login" class="container-fluid d-flex justify-content-center align-items-center">
        
        <div class="card text-bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">FILL OUT THIS FORM TO BE A DONOR</h5>
                <p class="card-text">After you submit the form you need to go to the RHU for further assessment and
                    validation.</p>
                <form action="{{-- route('register-donor') --}}" method="post" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Email <span>*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            title="Must be a valid active email address" placeholder="example@email.com"
                            value="{{-- old('email') --}}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{-- $message --}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address <span>*</span></label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            required placeholder="Barangay, Municipality, Province" value="{{-- old('address') --}}">
                        @error('address')
                            <div class="invalid-feedback">
                                {{-- $message --}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Firt Name <span>*</span></label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                            name="firstname" required placeholder="Juan" value="{{-- old('firstname') --}}">
                        @error('firstname')
                            <div class="invalid-feedback">
                                {{-- $message --}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Middle Name</label>
                        <input type="text" class="form-control @error('middlename') is-invalid @enderror"
                            name="middlename" placeholder="Dela" value="{{-- old('middlename') --}}">
                        @error('middlename')
                            <div class="invalid-feedback">
                                {{-- $message --}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Last Name <span>*</span></label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                            name="lastname" required placeholder="Cruz" value="{{-- old('lastname') --}}">
                        @error('lastname')
                            <div class="invalid-feedback">
                                {{-- $message --}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Blood Type <span>*</span></label>
                        <select class="form-select @error('blood_type') is-invalid @enderror" name="blood_type">
                            <option value="">--Please Select--</option>
                            {{-- @foreach ($bloodtypes as $bloodtype)
                                <option value="{{$bloodtype }}" @selected(old('blood_type') == $bloodtype)>{{-- $bloodtype }}
                                </option>
                            @endforeach --}}
                        </select>
                        @error('blood_type')
                            <div class="invalid-feedback">
                                {{-- $message --}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Gender <span>*</span></label>
                        <select class="form-select @error('gender')  is-invalid @enderror" name="gender">
                            <option value="">--Please Select--</option>
                            {{-- @foreach ($gender as $gndr)
                                <option value="{{-- $gndr }}" @selected(old('gender') == $gndr)>{{ $gndr }}
                                </option>
                            @endforeach --}}
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{-- $message --}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Birthdate <span>*</span></label>
                        <input type="date" name="bdate"
                            class="bdate form-control @error('bdate') is-invalid @enderror" placeholder="dd/mm/yyyy"
                            required value="{{-- old('bdate') --}}" id="bdate">
                        @error('bdate')
                            <div class="invalid-feedback">
                                {{-- $message --}}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Mobile No. <span>*</span></label>
                        <input type="number" name="contact_no"
                            class="form-control @error('contact_no') is-invalid @enderror"
                            value="{{-- old('contact_no') --}}" placeholder="0912345xxxx">
                        @error('contact_no')
                            <div class="invalid-feedback">
                                {{-- $message --}}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" name="terms" type="checkbox" value="true" checked
                                id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-white">terms and
                                    conditions</a>.
                                <span>*</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="col-md-12 btn btn-light">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Terms And Conditions For Blood Donation Management System</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            By Agreeing to donate blood through our Blood Donation Management System, you confirm that you are in good health and have not had any recent illnesses or diseases. <br>
            You confirm that you are not currently 	taking any medications that would prevent  you from being able to donate blood. <br>
            You confirm that you have not recently traveled to any locations with a high risk of infectious diseases. <br>
            You Understand that the blood donation process involves a brief physical examination and a small sample of your blood will be taken for testing. <br>
            You understand that the blood donation process may cause  some discomfort, such as slight dizziness or bruising at the puncture site. <br>
            You understand that the donate blood  will be use to help those in need and may be distribute to various medical facilities. <br>
            You Understand that your Personal information will be kept confidential and will only  be used for the purpose of blood donation. <br>
            You understand that you have the right  to change your mind and stop the donation process any time. <br>
            You understand  that  by donating blood you are saving lives and you are helping  people in need. <br>
            You understand that you are encouraged to return for the blood donation after a period of 56 days. <br>
            You understand that our Blood Donation Management System is not responsible for any adverse reactions or complications that my occur as a result of the blood donation process. <br>
            You understand that our Blood Donation Management System is not responsible for any errors or inaccuracies in the information provided  by you during the donation process. <br>
            You understand that by agreeing to these terms and conditions, you are giving your consent  to the Blood Donation Management System to collect, store and use your personal information for the purposes of blood donation management and operation of the system. <br>
            You understand that you have the right to access, correct and delete your personal information stored  by the Blood Donation Management System. 
            
        </div>
        <div class="modal-footer"> 
          <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>


