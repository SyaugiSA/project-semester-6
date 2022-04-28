

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid container-lg py-2">
        <a class="navbar-brand" href="#">
            <img src="{{asset('image/logo-masjid.png')}}" style="width: 50px" alt="">
            <p class="m-0 d-inline">
                ABU BAKAR AS-SHIDDIQ
            </p>
        </a>
        <div>
            <i class="fas fa-search d-lg-none d-inline-block btn-search"></i>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 justify-content-center">
                <li class="nav-item mx-lg-4">
                     <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a class="nav-link" href="{{url('/about')}}">About Us</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a class="nav-link" href="{{url('/event')}}">Event</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a class="nav-link" href="{{url('/donate')}}">Donate</a>
                </li>
                <li class="nav-item mx-lg-4">
                    <a class="nav-link" href="{{url('/service')}}">Service</a>
                </li>
            </ul>
            <i class="fas fa-search me-xl-5 me-lg-3 d-none d-lg-inline-block btn-search"></i>
            <button class="rounded-pill w-100 get-involved">
                Get Involved
            </button>
        </div>
    </div>
</nav>


