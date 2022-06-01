@extends('User.web')

@section('content')

        <div class="container">
            <div class="foto-donasi">
                <img src="{{'/storage/'.$data->gambar}}" alt="">
            </div>
            <h2 class="title-detail-donation">{{$data->judul}}</h2>
            <p>Desa kunir, Kec.kaliwates, kab jember</p>

            <p> Rp. 500.000 Terkumpul</p>


            <p> {{$data->deskripsi}}</p>

        </div>

@endsection
