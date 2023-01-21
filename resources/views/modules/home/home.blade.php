@extends('layouts.app')

@section('title')
    Welcome to BDMS!
@endsection

@section('content')
    <section id="landingHome" class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="text-landing">
                <h1 class="text-center">BLOOD DONATION <br> MANAGEMENT <br> SYSTEM</h1>
                <blockquote class="text-center">"Let's Come to Donate Blood"</blockquote>
            </div>
            <div>
                @php
                    $upcoming = App\Models\Event::where('date', '>=', date('Y-m-d'))
                        ->orderBy('date', 'asc')
                        ->paginate(3);
                @endphp
                @if (count($upcoming) > 0)
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Upcoming Events ({{ count($upcoming) }})</h4>
                        {{-- <p>There are {{ count($upcoming) }} upcoming events. Please check the list below.</p> --}}
                        <hr>
                        <ul>
                            @foreach ($upcoming as $event)
                                <li class="fw-bold">{{ $event->title }} will be held on
                                    {{ date('F d, Y', strtotime($event->date)) }}
                                </li>
                            @endforeach
                        </ul>
                        <hr>
                        <p class="mb-0">Please check the <a href="#blog" class="text-success">list of events for more
                                details</a>.</p>
                    </div>
                @endif
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
            @foreach ($events as $event)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('image/about.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $event->author }} |
                                {{ date('F d, Y', strtotime($event->date)) }}
                                @if ($event->date < date('Y-m-d'))
                                    <span class="badge bg-danger">Past Event</span>
                                @elseif ($event->date == date('Y-m-d'))
                                    <span class="badge bg-success">Today</span>
                                @else
                                    <span class="badge bg-primary">Upcoming</span>
                                @endif
                            </h6>
                            <p class="card-text">{{ $event->description }}</p>
                            <a href="">Read More...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
    <div class="row pagination">
        <div class="justify-content-center d-flex">
            {{ $events->links() }}
        </div>
    </div>
    <section id="contact" class="container-fluid d-flex flex-wrap">
        <div class="col-md-5 d-flex flex-column">
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
            <div class="card text-bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">FILL OUT THIS FORM TO BE A DONOR</h5>
                    <p class="card-text">After you submit the form you need to go to the RHU for further assessment and
                        validation.</p>
                    <form action="{{ route('register-donor') }}" method="post" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label">Email <span>*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                title="Must be a valid active email address" placeholder="example@email.com"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address <span>*</span></label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                required placeholder="Barangay, Municipality, Province" value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Firt Name <span>*</span></label>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                name="firstname" required placeholder="Juan" value="{{ old('firstname') }}">
                            @error('firstname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control @error('middlename') is-invalid @enderror"
                                name="middlename" placeholder="Dela" value="{{ old('middlename') }}">
                            @error('middlename')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Last Name <span>*</span></label>
                            <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                name="lastname" required placeholder="Cruz" value="{{ old('lastname') }}">
                            @error('lastname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Blood Type <span>*</span></label>
                            <select class="form-select @error('blood_type') is-invalid @enderror" name="blood_type">
                                <option value="">--Please Select--</option>
                                @foreach ($bloodtypes as $bloodtype)
                                    <option value="{{ $bloodtype }}" @selected(old('blood_type') == $bloodtype)>{{ $bloodtype }}
                                    </option>
                                @endforeach
                            </select>
                            @error('blood_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Gender <span>*</span></label>
                            <select class="form-select @error('gender')  is-invalid @enderror" name="gender">
                                <option value="">--Please Select--</option>
                                @foreach ($gender as $gndr)
                                    <option value="{{ $gndr }}" @selected(old('gender') == $gndr)>{{ $gndr }}
                                    </option>
                                @endforeach
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Birthdate <span>*</span></label>
                            <input type="date" name="bdate"
                                class="bdate form-control @error('bdate') is-invalid @enderror" placeholder="dd/mm/yyyy"
                                required value="{{ old('bdate') }}" id="bdate">
                            @error('bdate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mobile No. <span>*</span></label>
                            <input type="number" name="contact_no"
                                class="form-control @error('contact_no') is-invalid @enderror"
                                value="{{ old('contact_no') }}" placeholder="0912345xxxx">
                            @error('contact_no')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" name="terms" type="checkbox" value="true" checked
                                    id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    I agree to the <a href="#" class="text-white">terms and
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
        </div>
    </section>
@endsection
