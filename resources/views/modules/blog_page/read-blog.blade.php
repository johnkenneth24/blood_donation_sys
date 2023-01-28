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
                </ul>
            </div>
        </div>
    </nav>

    <section id="read-blog" class="">
        <div class="container">
            <div class="col-md-12">
                <div class="card mb-3">
                    <img src="{{ asset('image/about.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text"><small class="text-muted">Author | 3 mins ago</small></p>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, ut hic at dignissimos consectetur ipsum, unde blanditiis odio deleniti tempore accusantium optio veniam atque dicta nostrum debitis laboriosam a quaerat?</p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>





{{-- @extends('layouts.app')

@section('title')
    Welcome to BDMS!
@endsection

@section('content')
    <section id="read-blog" class="">
        <div class="container">
            <div class="col-md-12">
                <div class="card mb-3">
                    <img src="{{ asset('image/about.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text"><small class="text-muted">Author | 3 mins ago</small></p>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, ut hic at dignissimos consectetur ipsum, unde blanditiis odio deleniti tempore accusantium optio veniam atque dicta nostrum debitis laboriosam a quaerat?</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection --}}
