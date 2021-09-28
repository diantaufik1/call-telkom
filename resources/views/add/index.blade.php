<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset ('assets/fonts/icomoon/style.css')}}">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset ('assets/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset ('assets/css/style.css')}}">
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM&callback=initMap"></script>

    <title>Contact</title>
    <style>
        #map {
            height: 250px !important;
            width: 100% !important;
            border: 2px solid beige;
        }
    </style>
</head>

<body>


    <div class="content">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">


                    <div class="row justify-content-center">
                        <div class="col-md-6">

                            <h3 class="heading mb-4">Selamat Datang Di Layanan Telkom Genteng!</h3>
                            <p>Silakan Isi Data Diri Anda dan Permasalahan Anda di Form Pengajuan Permasalahan Indihome </p>

                            <p><img src="{{asset ('assets/images/logo.png')}}" alt="Image" class="img-fluid"></p>
                            <p class="alert-danger text-center head">Peringatan</p>
                            <p>Jika lokasi Maps/Peta tidak muncul refresh Website Ini!</p>
                            <hr>
                        </div>
                        <div class="col-md-6">

                            <form class="mb-6" action="add" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="id_pelanggan" id="name" placeholder="Masukan Nomer Internet/Telepon . ." value="{{old('id_pelanggan')}}">
                                        <span>@error('id_pelanggan')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Masukan Nama Lengkap . ." value="{{old('nama_pelanggan')}}">
                                        @error('nama_pelanggan')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="no_whatsapp" id="noWhatsapp" placeholder="Masukan Nomor Whatsapp . ." value="{{old('no_whatsapp')}}">
                                        @error('no_whatsapp')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="no_telepon" id="noTelepon" placeholder="Masukan Nomor HP . ." value="{{old('no_telepon')}}">
                                        @error('no_telepon')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 " id="google-map">
                                        <div class="card">
                                            <div class="card-header bg-light text-black">
                                                Pilih Lokasi Anda :
                                            </div>
                                            <div class="card-body">
                                                <div id="map"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2 disabled">
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="latitude" id="latitude" placeholder=" klik peta (Latitude)" value="{{old('latitude')}}">
                                        @error('latitude')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="longitude" id="longitude" placeholder="klik peta (Longitude)" value="{{old('longitude')}}">
                                        @error('longitude')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <!-- <input type="text" class="form-control" name="Longitude" id="Longitude" placeholder="Longitude"> -->
                                        <select class="form-control" name="jam_kunjung" id="jam_kunjung" value="{{old('jam_kunjung')}}">
                                            @error('jam_kunjung')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror
                                            <option value="-">Silakan Pilih Jam Kunjung</option>
                                            <option>08.00 - 09.00</option>
                                            <option>09.00 - 10.00</option>
                                            <option>10.00 - 11.00</option>
                                            <option>11.00 - 12.00</option>
                                            <option>12.00 - 13.00</option>
                                            <option>13.00 - 14.00</option>
                                            <option>14.00 - 15.00</option>
                                            <option>15.00 - 16.00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <!-- <input type="text" class="form-control" name="Longitude" id="Longitude" placeholder="Longitude"> -->
                                        <select class="form-control" name="jenis_layanan" id="jenis_layanan" value="{{old('jenis_layanan')}}">
                                            @error('jenis_layanan')
                                            <span class="text-danger">{{ $message}}</span>
                                            @enderror

                                            <!-- <option value="Silakan Pilih Jam Kunjung">Silakan Pilih Jam Kunjung</option> -->
                                            <option>Internet</option>
                                            <option>IPTV</option>
                                            <option>Telepon</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="solusi_segmen" id="solusi_segmen" cols="30" rows="7" placeholder="Tuliskan Di Sini . ." value="{{old('solusi_segmen')}}"></textarea>
                                        <span>@error('solusi_segmen'){{ $message}}

                                            @enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="solusi_aktual" id="solusi_aktual" cols="30" rows="7" placeholder="Tuliskan  Anda Di Sini . ." value="{{old('solusi_aktual')}}"></textarea>
                                        <span>@error('solusi_aktual'){{ $message}}

                                            @enderror</span>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="gaul" id="gaul" placeholder="gaul. ." value="{{old('gaul')}}">
                                        @error('gaul')
                                        <span>{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="masalah" id="masalah" cols="30" rows="7" placeholder="Tuliskan Permasalahan Anda Di Sini . ." value="{{old('masalah')}}"></textarea>
                                        @error('masalah')
                                        <span class="text-danger">{{ $message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>
                            @if (Session::get('Success'))
                            <div id="form-message-warning mt-4"></div>
                            <div class="alert alert-success">
                                {{Session::get('Success')}}
                                Your message was sent, thank you!
                            </div>
                            @endif
                            <div id="form-message-warning mt-4"></div>
                            <div id="form-message-success">
                                Your message was sent, thank you!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var marker;

        function buatMarker(peta, posisiTitik) {

            if (marker) {
                // pindahkan marker
                marker.setPosition(posisiTitik);
            } else {
                // buat marker baru
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta
                });
            }

            // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();

        }

        function initMap() {

            var options = {
                center: {
                    lat: -8.363650,
                    lng: 114.147039
                },
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }


            map = new google.maps.Map(document.getElementById("map"), options);


            google.maps.event.addListener(map, 'click', function(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
                buatMarker(this, event.latLng);

            });



        }

        google.maps.event.addDomListener(window, 'load', init_map);
    </script>`
    <script src="{{asset ('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset ('js/popper.min.js')}}"></script>
    <script src="{{asset ('js/bootstrap.min.js')}}"></script>
    <script src="{{asset ('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset ('js/main.js')}}"></script>


</body>

</html>
