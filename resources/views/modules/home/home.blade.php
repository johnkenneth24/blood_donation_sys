@extends('layouts.app')

@section('title')
    Welcome to BDMS!
@endsection

@section('content')
    <section id="landingHome" class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div data-aos="fade-down" data-aos-duration="1500" class="text-landing">
                <h1 class="text-center">BLOOD DONATION <br> MANAGEMENT <br> SYSTEM</h1>
                <blockquote class="text-center">"Join Us And Save Lives!"</blockquote>
            </div>

            @php
                $upcoming = App\Models\Event::where('date', '>=', date('Y-m-d'))
                    ->orderBy('date', 'asc')
                    ->paginate(3);
            @endphp
            <div class="col-md-12">
                <div data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1500" class="card card-custom gutter-b">
                    <div class="card-header p-0 pt-2">
                        <div class="card-title">
                            <span class="card-icon">
                                <i class="flaticon2-chat-1 text-primary"></i>
                            </span>
                            @if (count($upcoming) > 0)
                                <h6 class="card-label mb-0 ps-2">
                                    UPCOMING EVENT/S ({{ count($upcoming) }})
                                </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach ($upcoming as $event)
                                <li class="text-wrap">{{ $event->title }} will be held on
                                    {{ date('F d, Y', strtotime($event->date)) }}
                                    ({{ date('h:i A', strtotime($event->time)) }})
                                    at {{ $event->location }}. <a class="fst-italic"
                                        href="{{ route('donor.register') }}">Register Here!</a>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <p class="mb-0 fs-6">Please check the <a href="#blog" class="text-success">list of events for more
                                details</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-6">
                <div data-aos="fade-right" data-aos-duration="1500" class="image text-center">
                    <img src="{{ asset('image/about.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div data-aos="fade-left" data-aos-duration="1500" class="text">
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
        @php
            use Illuminate\Support\Str;
        @endphp
        <div class="col-md-12 d-flex flex-wrap justify-content-center">
            @forelse ($events as $event)
                <div class="col-md-3 d-flex justify-content-center">
                    <div data-aos="flip-left" data-aos-duration="1500" class="card mb-2 card-custom" style="width: 300px;">
                        <img src="/image/{{ $event->image }}" class="card-img-top" style="width: 100%; height: 180px;"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $event->title }}</h5>
                            <h6 class="text-center">
                                @if (date('Y-m-d', strtotime($event->date)) < date('Y-m-d'))
                                    <span class="badge bg-danger">Past Event</span>
                                @elseif (date('Y-m-d', strtotime($event->date)) == date('Y-m-d'))
                                    <span class="badge bg-success">Today</span>
                                @else
                                    <span class="badge bg-primary">Upcoming</span>
                                @endif
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted text-center">
                                {{ date('h:i A', strtotime($event->time)) }} |
                                {{ date('F d, Y', strtotime($event->date)) }}
                            </h6>
                            <p class="card-text">{{ Str::words($event->description, 5, $end = '...') }}</p>
                            <a href="{{ route('event.view', $event->id) }}">Read More...</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row justify-content-center d-flex">
                    <h1 class="text-muted" style="text-align: center !important;">Events are shown here.</h1>
                </div>
            @endforelse
        </div>
    </section>
    <div class="row pagination">
        <div class="justify-content-center d-flex">
            {{ $events->links() }}
        </div>
    </div>

    <section id="contact" class="container-fluid d-flex flex-wrap align-items-center">
        <div data-aos="fade-right" data-aos-duration="1500" class="col-md-6 ps-5">
            <div class="des-contact">
                <h1 class="text-danger"><i class="fas fa-map-marker-alt"> </i> RHU IROSIN</h1>
                <p class="mt-4">Below are the contact information:</p>
            </div>
            <div class="contact row ">
                <div class="contact-info">
                    <div class="info mb-3">
                        <i class="fas fa-phone"></i><span class="ms-3">0909-428-9335</span>
                    </div>
                    <div class="info mb-3">
                        <i class="fas fa-envelope"> </i><span class="ms-3">rhu_irosindistrict@gmail.com</span>
                    </div>
                    <div class="info mb-3">
                        <i class="fas fa-map-marker-alt"> </i><span class="ms-3">Irosin Rural Health Unit, Irosin,
                            Sorsogon</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center align-items-center flex-column">
            <div data-aos="zoom-in-up" data-aos-duration="1500" class="card card-custom w-100">
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('contact.submit') }}">
                        @csrf
                        <h3 class="text-center text-muted">Contact Us</h3>
                        <div class="form-group mb-2">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label>Message</label>
                            <textarea name="message" class="form-control" placeholder="Your Message" required></textarea>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
