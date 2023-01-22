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

            @php
                $upcoming = App\Models\Event::where('date', '>=', date('Y-m-d'))
                    ->orderBy('date', 'asc')
                    ->paginate(3);
            @endphp
            <div class="card card-custom gutter-b">
                <div class="card-header p-0 pt-2">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-chat-1 text-primary"></i>
                        </span>
                        @if (count($upcoming) > 0)
                            <h6 class="card-label mb-0">
                                UPCOMING EVENT/S ({{ count($upcoming) }})
                            </h6>
                    </div>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($upcoming as $event)
                            <li class="text-wrap">{{ $event->title }} will be held on
                                {{ date('F d, Y', strtotime($event->date)) }}. <a class="fst-italic"
                                    href="{{ route('register.index') }}">Register Here!</a>
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
        @php
            use Illuminate\Support\Str;
        @endphp
        <div class="row d-flex justify-content-center">
            @forelse ($events as $event)
                <div class="col-md-3">
                    <div class="card card-custom" style="width: 100%;">
                        <img src="/image/{{ $event->image }}" class="card-img-top" style="width: 100%; height: 180px;" alt="...">
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
                            <p class="card-text">{{ Str::words($event->description, 5, $end='...') }}</p>
                            <a href="#">Read More...</a>
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
        <div class="col-md-6 ps-5">
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
            <div class="card card-custom w-100">
                <div class="card-body">
                    <form action="mailto:rhu_irosindistrict@gmail.com" target="_blank">
                        <h5 class="card-title">Send us your enquiries</h5>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
