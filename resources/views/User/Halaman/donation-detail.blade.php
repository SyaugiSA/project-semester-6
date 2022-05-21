@extends('User.web')


@section('head')


<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<link rel="stylesheet" href="{{asset('css/FeLaznas/multiStep.css')}}">
<script src="{{asset('js/FeLaznas/multiStep.js')}}"></script>
@endsection

@section('content')

    <section>

        <div class="container">
            
            <div class="foto-donasi">

                <img src="{{ asset('image/foto_takmir.jpg') }}" alt="">
            </div>
            <h2 class="title-detail-donation">Donasi Korban Banjir</h2>
            <p>Desa kunir, Kec.kaliwates, kab jember</p>

            <p> Rp. 500.000 Terkumpul</p>
            <div class="progress-donation-detail" >
                <div class="progress-donation-done-detail" data-done-detail="90" id="text"></div>
            </div>
            
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam impedit quod quis voluptates eligendi quidem quisquam fugiat, neque adipisci dolore omnis 
                saepe rerum ipsum perspiciatis dolorum temporibus molestiae, ea recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum exercitationem quae delectus consectetur dicta obcaecati quidem? Dolore iure vero
                laudantium ex veniam nobis fugiat voluptatum, id rem beatae, officiis tempore.</p>

            
        </div>

    </section>


    <section>
        <div class="container">
            
            <h2 id="heading">Donasi</h2>
            <p>Isi semua form dan ikuti langkahnya</p>

            <form id="msform">
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active" id="account"><strong>Pilih Rek Tujuan</strong></li>
                    
                    <li id="payment"><strong>Upload Bukti Transfer</strong></li>
                    <li id="confirm"><strong>Finish</strong></li>
                </ul>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br>
                <!-- fieldsets -->
                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Account Information:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 1 - 3</h2>
                            </div>
                        </div>
                        <label class="fieldlabels">Email: *</label>
                        <input type="email" name="email" placeholder="Email"/>
                        <label class="fieldlabels">Nama Donatur: *</label>
                        <input type="text" name="uname" placeholder="Nama Donatur"/>
                        <div class="checkbox-card">
                            <input type="checkbox" name="" id="check">
                            <label for="">Sembunyikan nama / hamba allah</label>
                        </div>

                        <label class="fieldlabels mb-2">Pilih Rekening : </label> <br>
                        <select name=""  id="selectBank">
                            <option >--Pilih Rekening--</option>
                            <option value="Bri" class="fieldlabels">BANK BRI</option>
                            <option value="Bca" class="fieldlabels">BANK BCA</option>
                            <option value="Bni" class="fieldlabels">BANK BNI</option>
                            <option value="Mandiri" class="fieldlabels">BANK MANDIRI</option>
                        </select>

                        <div id="showBri" class="myDiv">
                            <img src="{{asset('image/Bank Rakyat Indonesia (BRI).png')}}"/><span>0129301923091</span>
                        </div>
                        <div id="showBca" class="myDiv">
                            <img src="{{asset('image/BCA.png')}}" /><span>00097584638</span>
                        </div>
                        <div id="showBni" class="myDiv">
                            <img src="{{asset('image/Logo bank BNI.png')}}" /><span>123134444</span>
                        </div>
                        <div id="showMandiri" class="myDiv">
                            <img src="{{asset('image/Mandiri_logo.png')}}" /><span>2131231</span>
                        </div>
                    </div>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </fieldset>
               
                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Image Upload:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 2 - 3</h2>
                            </div>
                        </div>
                        <label class="fieldlabels">UUpload Bukti Transfer</label>
                        <input type="file" name="pic" accept="image/*">
                        
                    </div>
                    <input type="button" name="next" class="next action-button" value="Submit"/>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                </fieldset>
                <fieldset>
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Finish:</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">Step 3 - 3</h2>
                            </div>
                        </div>
                        <br><br>
                        <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <img src="{{asset('image/berhasil.png')}}" class="fit-image">
                            </div>
                        </div>
                        <br><br>
                        <div class="row justify-content-center">
                            <div class="col-7 text-center">
                                <h5 class="purple-text text-center">Data sudah diterima</h5>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
             
        </div>
    </section>

    <script>

        
        const progress = document.querySelector('.progress-donation-done-detail');
        let text = progress.getAttribute('data-done-detail');
        document.getElementById("text").innerHTML = text + '%';

        setTimeout(() => {
            
            progress.style.opacity = 1;
            progress.style.width = progress.getAttribute('data-done-detail') + '%' ;
        }, 500);



    </script>

    <script src="{{asset('js/FeLaznas/formatRp.js')}}"></script>
@endsection