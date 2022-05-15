@extends('User.web')


@section('head')
    <link rel="stylesheet" href="{{asset('css/FeLaznas/cardArtikel.css')}}">
@endsection
@section('content')


<section>
    <div class="container">
        <div>
            <ul class="cards">
                <li>
                  <a href="" class="card">
                    <img src="{{asset('image/foto_takmir.jpg')}}" class="card__image" alt="" />
                    <div class="card__overlay">
                      <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                        {{-- <img class="card__thumb" src="https://i.imgur.com/7D7I6dI.png" alt="" /> --}}
                        <div class="card__header-text">
                          <h3 class="card__title">Penyaluran Dana Di Gunung Lawu kab.lumajang, kec. lapose.</h3>            
                          <span class="card__status">01-April-2022</span>
                        </div>
                      </div>
                      <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
                      <p class="card__description">Klik Artikel - Selengakpnya</p>
                    </div>
                  </a>      
                </li>
                <li>
                  <a href="" class="card">
                    <img src="{{asset('image/foto_takmir.jpg')}}" class="card__image" alt="" />
                    <div class="card__overlay">
                      <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                        {{-- <img class="card__thumb" src="https://i.imgur.com/7D7I6dI.png" alt="" /> --}}
                        <div class="card__header-text">
                          <h3 class="card__title">Penyaluran Dana Di Gunung Lawu kab.lumajang, kec. lapose.</h3>            
                          <span class="card__status">01-April-2022</span>
                        </div>
                      </div>
                      <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
                      <p class="card__description">Klik Artikel - Selengakpnya</p>
                    </div>
                  </a>      
                </li>
                <li>
                  <a href="" class="card">
                    <img src="{{asset('image/foto_takmir.jpg')}}" class="card__image" alt="" />
                    <div class="card__overlay">
                      <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                        {{-- <img class="card__thumb" src="https://i.imgur.com/7D7I6dI.png" alt="" /> --}}
                        <div class="card__header-text">
                          <h3 class="card__title">Penyaluran Dana Di Gunung Lawu kab.lumajang, kec. lapose.</h3>            
                          <span class="card__status">01-April-2022</span>
                        </div>
                      </div>
                      <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
                      <p class="card__description">Klik Artikel - Selengakpnya</p>
                    </div>
                  </a>      
                </li>
                <li>
                  <a href="" class="card">
                    <img src="{{asset('image/foto_takmir.jpg')}}" class="card__image" alt="" />
                    <div class="card__overlay">
                      <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                        {{-- <img class="card__thumb" src="https://i.imgur.com/7D7I6dI.png" alt="" /> --}}
                        <div class="card__header-text">
                          <h3 class="card__title">Penyaluran Dana Di Gunung Lawu kab.lumajang, kec. lapose.</h3>            
                          <span class="card__status">01-April-2022</span>
                        </div>
                      </div>
                      <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, blanditiis?</p>
                      <p class="card__description">Klik Artikel - Selengakpnya</p>
                    </div>
                  </a>      
                </li>
               
                 
              </ul>
        </div>
    </div>
</section>



@endsection