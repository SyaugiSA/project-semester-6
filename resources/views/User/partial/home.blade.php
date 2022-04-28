@extends('User.web')

@section('head')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->

    <link rel="stylesheet"
        href="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>

   <script>
       function getDay(d, i) {
           day = new Date(d);
           var daylist = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
           document.getElementById("day"+i).innerHTML = daylist[day.getDay()];
       }

       function getDate(d, i) {
           day = new Date(d);
           var monthlist = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
           document.getElementById("date"+i).innerHTML = day.getDate() + " " + monthlist[day.getMonth()] + " " + day.getFullYear();
       }
   </script>

@endsection
@section('content')

<div class="container container">
    <section class="mt-3 banner">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md order">
                <h1 class="title">Are you ready to start learning?</h1>
                <p class="subtitle">We strive to congregate at least once a weaek to discuss share and learn.</p>
                <div class="d-flex justify-content-center d-md-block">
                  <button type="button" class="btn btn-light rounded-pill px-4 carousel-button">Read More</button>
                  <button type="button" class="btn btn-outline-light rounded-pill px-3 ms-3 carousel-button">Get
                    Involved</button>
                </div>
              </div>
              <div class="col-md order">
                <img src="./images/masjid-png-clipart-best-3.png" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md order">
                <h1 class="title">Are you ready to start learning?</h1>
                <p class="subtitle">We strive to congregate at least once a weaek to discuss share and learn.</p>
                <div class="d-flex justify-content-center d-md-block">
                  <button type="button" class="btn btn-light rounded-pill px-4 carousel-button">Read More</button>
                  <button type="button" class="btn btn-outline-light rounded-pill px-3 ms-3 carousel-button">Get
                    Involved</button>
                </div>
              </div>
              <div class="col-md order">
                <img src="./images/Mosque-PNG-Image-HD.png" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md order">
                <h1 class="title">Are you ready to start learning?</h1>
                <p class="subtitle">We strive to congregate at least once a weaek to discuss share and learn.</p>
                <div class="d-flex justify-content-center d-md-block">
                  <button type="button" class="btn btn-light rounded-pill px-4 carousel-button">Read More</button>
                  <button type="button" class="btn btn-outline-light rounded-pill px-3 ms-3 carousel-button">Get
                    Involved</button>
                </div>
              </div>
              <div class="col-md order">
                <img src="./images/masjid-png-clipart-best-3.png" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md order">
                <h1 class="title">Are you ready to start learning?</h1>
                <p class="subtitle">We strive to congregate at least once a weaek to discuss share and learn.</p>
                <div class="d-flex justify-content-center d-md-block">
                  <button type="button" class="btn btn-light rounded-pill px-4 carousel-button">Read More</button>
                  <button type="button" class="btn btn-outline-light rounded-pill px-3 ms-3 carousel-button">Get
                    Involved</button>
                </div>
              </div>
              <div class="col-md order">
                <img src="./images/Mosque-PNG-Image-HD.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="quick-links">
      <div>
        <h4>Quick Links</h4>
        <button class="rounded-pill btn-show-details">Show all</button>
      </div>
      <div class="link-wrapper">
        <a href="" class="card-list">
          <i class="fas fa-hand-holding-usd donate-icon"></i>
          <p class="title">Donate</p>
          <p class="view-details">View Details</p>
        </a>
        <a href="" class="card-list">
          <i class="fas fa-hand-holding-usd donate-icon"></i>
          <p class="title">Donate</p>
          <p class="view-details">View Details</p>
        </a>
        <a href="" class="card-list">
          <i class="fas fa-hand-holding-usd donate-icon"></i>
          <p class="title">Donate</p>
          <p class="view-details">View Details</p>
        </a>
        <a href="" class="card-list">
          <i class="fas fa-hand-holding-usd donate-icon"></i>
          <p class="title">Donate</p>
          <p class="view-details">View Details</p>
        </a>
        <a href="" class="card-list">
          <i class="fas fa-hand-holding-usd donate-icon"></i>
          <p class="title">Donate</p>
          <p class="view-details">View Details</p>
        </a>
        <a href="" class="card-list">
          <i class="fas fa-hand-holding-usd donate-icon"></i>
          <p class="title">Donate</p>
          <p class="view-details">View Details</p>
        </a>
      </div>
    </section>

    <section class="prayer-times">
      <div class="row">
        <div class="col-md ps-5 ps-md-0">
          <div class="float-md-end">
            <h3>West covina,</h3>
            <h5>California</h5>
          </div>
        </div>
        <div class="col-md-7 px-5">
          <h3>Prayer Times</h3>
          <h5><span>5:15</span> Sunrise</h5>
          <div class="row times mt-4">
            <div class="col">
              <img src="./images/fajr.png" alt="">
              <h5>FAJR</h5>
              <h5>5:00<span>am</span></h5>
            </div>
            <div class="col">
              <img src="./images/zhur.png" alt="">
              <h5>ZHUR</h5>
              <h5>1:30<span>pm</span></h5>
            </div>
            <div class="col">
              <img src="./images/asr.png" alt="">
              <h5>ASR</h5>
              <h5>4:30<span>pm</span></h5>
            </div>
            <div class="col">
              <img src="./images/maghrib.png" alt="">
              <h5>MAGHRIB</h5>
              <h5>6:30<span>pm</span></h5>
            </div>
            <div class="col">
              <img src="./images/isha.png" alt="">
              <h5>ISHA</h5>
              <h5>8:00<span>pm</span></h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="event">
      <h4>Events</h4>
      <button class="rounded-pill btn-show-details">Show all</button>
      <div class="row m-auto mt-5 pt-4">
        <div class="col-lg-8 pe-4">
          <div class="row p-4 border align-items-center mb-3 rounded">
            <div class="col">
              <div class="border-end">
                <h5 class="date">Feb 22</h5>
                <p class="day">Tues</p>
              </div>
            </div>
            <div class="col-6">
              <h5>Dua Tawassul</h5>
              <p>5.30pm, Balishira Resort</p>
            </div>
            <div class="col">
              <button class="rounded-pill btn-show-details">View Details</button>
            </div>
          </div>
          <div class="row p-4 border align-items-center mb-3 rounded">
            <div class="col">
              <div class="border-end">
                <h5 class="date">Feb 22</h5>
                <p class="day">Tues</p>
              </div>
            </div>
            <div class="col-6">
              <h5>Dua Tawassul</h5>
              <p>5.30pm, Balishira Resort</p>
            </div>
            <div class="col">
              <button class="rounded-pill btn-show-details">View Details</button>
            </div>
          </div>
          <div class="row p-4 border align-items-center mb-3 rounded">
            <div class="col">
              <div class="border-end">
                <h5 class="date">Feb 22</h5>
                <p class="day">Tues</p>
              </div>
            </div>
            <div class="col-6">
              <h5>Dua Tawassul</h5>
              <p>5.30pm, Balishira Resort</p>
            </div>
            <div class="col">
              <button class="rounded-pill btn-show-details">View Details</button>
            </div>
          </div>
          <div class="row p-4 border align-items-center mb-3 rounded">
            <div class="col">
              <div class="border-end">
                <h5 class="date">Feb 22</h5>
                <p class="day">Tues</p>
              </div>
            </div>
            <div class="col-6">
              <h5>Dua Tawassul</h5>
              <p>5.30pm, Balishira Resort</p>
            </div>
            <div class="col">
              <button class="rounded-pill btn-show-details">View Details</button>
            </div>
          </div>
        </div>
        <div class="col-lg upcoming-event">
          <div class="border rounded p-4">
            <h5>Upcoming</h5>
            <h5>Event</h5>
            <div id="carouselExampleIndicators2" class="carousel slide mt-3" data-bs-ride="carousel">
              
              <div class="carousel-inner rounded border overflow-hidden">
                <div class="carousel-item active">
                  <img src="./images/BDwLWz.png" class="d-block w-100" alt="...">
                  <h5 class="p-4">The Ten Most Common Misconceptions about Islam</h5>
                </div>
                <div class="carousel-item">
                  <img src="./images/BDwLWz.png" class="d-block w-100" alt="...">
                  <h5 class="p-4">The Ten Most Common Misconceptions about Islam</h5>
                </div>
                <div class="carousel-item">
                  <img src="./images/BDwLWz.png" class="d-block w-100" alt="...">
                  <h5 class="p-4">The Ten Most Common Misconceptions about Islam</h5>
                </div>
              </div>
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators2"
                  data-bs-slide-to="0" class="carousel-indicator active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators2"
                  data-bs-slide-to="1" class="carousel-indicator " aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators2"
                  data-bs-slide-to="2" class="carousel-indicator " aria-label="Slide 3"></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="event-banner">
      <div id="carouselExampleControls3" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md order">
                <h1 class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, error!</h1>
                <p class="name">Nama ustad, (Speaker)</p>
                <p class="subtitle">Mashad, Iran.</p>
              </div>
              <div class="col-md order">
                <img src="./images/masjid-png-clipart-best-3.png" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md order">
                <h1 class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, error!</h1>
                <p class="name">Nama ustad, (Speaker)</p>
                <p class="subtitle">Mashad, Iran.</p>
              </div>
              <div class="col-md order">
                <img src="./images/Mosque-PNG-Image-HD.png" alt="">
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md order">
                <h1 class="title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, error!</h1>
                <p class="name">Nama ustad, (Speaker)</p>
                <p class="subtitle">Mashad, Iran.</p>
              </div>
              <div class="col-md order">
                <img src="./images/masjid-png-clipart-best-3.png" alt="">
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls3" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
  </div>
  <section class="photo">
    <div class="container container">
      <h4>Photo Gallery</h4>
      <button class="rounded-pill btn-show-details">Show all</button>
      <div class="row mt-5 pt-4">
        <div class="col-4">
          <div class="rounded overflow-hidden image-wrapper">
            <img src="./images/BDwLWz.png" alt="">
          </div>
        </div>
        <div class="col-4">
          <div class="rounded overflow-hidden image-wrapper">
            <img src="./images/BDwLWz.png" alt="">
          </div>
        </div>
        <div class="col-4">
          <div class="rounded overflow-hidden image-wrapper">
            <img src="./images/BDwLWz.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="donation-subcribe text-center">
    <div class="donation-wrapper">
      <div class="donation">
        <h1>Help us Better Serve You</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque corrupti eum quis. Asperiores ipsa, minima assumenda sit quia quisquam quidem ducimus aliquam, est repellat vero alias laborum voluptate animi deleniti.</p>
        <button class="btn rounded-pill px-4">Donate Today!</button>
      </div>
    </div>
    <div class="container container shadow subcribe">
      <h3>Subcribe Now to Receive Updates!</h3>
      <p>As always, the best way to keep in touch is to join our mailing list</p>
      <div class="subcribe-input">
        <input type="email" name="" class="rounded-pill border" placeholder="Email" id="">
        <button class="rounded-pill w-100 get-involved my-2 btn-subcribe">
          Subcribe
        </button>
      </div>
    </div>

  </section>

@endsection

@section('script')

    <!-- InputMask/Moment JS -->
    <script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    {{-- Jss Praytime --}}
    {{-- <script src="{{asset('js/FeMasjid/prayTime.js')}}"></script> --}}
    <script src="{{ asset('js/FeLaznas/api/PrayTime.js') }}"></script>

   
@endsection
