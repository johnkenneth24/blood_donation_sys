 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <title>@yield('title')</title>
     <meta name="description" content="BDMS" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <link rel="canonical" href="url" />
     @stack('links')
     <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="shortcut icon" href="{{ asset('images/blood-alt.png') }}" type="image/x-icon" />
     <script src="https://kit.fontawesome.com/5d19900f91.js" crossorigin="anonymous"></script>
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
     <style>
         [x-cloak] {
             display: none !important;
         }
     </style>
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
                         <a class="nav-link" href="#landingHome">Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#about">About</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#blog">Event & News</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#contact">Contact</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('login') }}">Log In</a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>

     @section('content')@show

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
     </script>
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

     <script>
        AOS.init();
      </script>

     @stack('scripts')

 </body>

 </html>
