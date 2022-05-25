@extends('User.web')

@section('content')

    <section><div class="progress-bar"></div>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4  mt-2 mb-2 ">
                    
                    <div class="card-donation">
                        <img src="{{asset('image/humas.jpg')}}" alt="">
                        <p>Laznas</p>
        
                    <h2 class="title">Donasi Korban Banjir</h2>
                    <p> Rp. 500.000 Terkumpul</p>
                    <div class="progress-donation" >
                        <div class="progress-donation-done" data-done="90" id="text"></div>
                    </div>
                    <button class="rounded-pill btn-donation m-2">Donasi</button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4  mt-2 mb-2 ">
                    
                    <div class="card-donation">
                        <img src="{{asset('image/humas.jpg')}}" alt="">
                        <p>Laznas</p>
        
                    <h2 class="title">Donasi Korban Banjir</h2>
                    <p>Dibuthkan  Rp 4.000.000 </p>
                        <div class="progress-donation" >
                            <div class="progress-donation-done" data-done="50" id="text"></div>
                        </div>
                        <button class="rounded-pill btn-donation m-2">Donasi</button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4  mt-2 mb-2 ">
                    
                    <div class="card-donation">
                        <img src="{{asset('image/humas.jpg')}}" alt="">
                        <p>Laznas</p>
        
                    <h2 class="title">Donasi Korban Banjir</h2>
                    <p> Rp. 500.000 Terkumpul</p>
                    <div class="progress-donation" >
                        <div class="progress-donation-done" data-done="90" id="text"></div>
                    </div>
                    <button class="rounded-pill btn-donation m-2">Donasi</button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4  mt-2 mb-2 ">
                    
                    <div class="card-donation">
                        <img src="{{asset('image/humas.jpg')}}" alt="">
                        <p>Laznas</p>
        
                    <h2 class="title">Donasi Korban Banjir</h2>
                    <p> Rp. 500.000 Terkumpul</p>
                    <div class="progress-donation" >
                        <div class="progress-donation-done" data-done="90" id="text"></div>
                    </div>
                    <button class="rounded-pill btn-donation m-2">Donasi</button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4  mt-2 mb-2 ">
                    
                    <div class="card-donation">
                        <img src="{{asset('image/foto_takmir.jpg')}}" alt="">
                        <p>Laznas</p>
        
                    <h2 class="title">Donasi Korban Banjir</h2>
                    <p> Rp. 500.000 Terkumpul</p>
                    <div class="progress-donation" >
                        <div class="progress-donation-done" data-done="90" id="text"></div>
                    </div>
                    <button class="rounded-pill btn-donation m-2">Donasi</button>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


    <script>

        
        const progress = document.querySelector('.progress-donation-done');
        let text = progress.getAttribute('data-done');
        document.getElementById("text").innerHTML = text + '%';

        setTimeout(() => {
            
            progress.style.opacity = 1;
            progress.style.width = progress.getAttribute('data-done') + '%' ;
        }, 500);



    </script>
@endsection