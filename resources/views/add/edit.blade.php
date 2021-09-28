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

                            <h3 class="heading mb-4">{{$Title}} Form Pengajuan</h3>

                            <p><img src="{{asset ('assets/images/logo.png')}}" alt="Image" class="img-fluid"></p>



                        </div>
                        <div class="col-md-6">

                            <form class="mb-6" action="{{route('update')}}" method="post" name="contactForm">
                                @csrf
                                <input type="hidden" name="cid" value="{{$info->id}}">

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Your nama_pelanggan" value="{{$info->nama_pelanggan}}">
                                        <span>@error('nama_pelanggan'){{ $message}}

                                            @enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="no_whatsapp" id="no_whatsapp" placeholder="Nomor Whatsapp" value="{{$info->no_whatsapp}}">
                                        <span>@error('no_whatsapp'){{ $message}}

                                            @enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" name="no_telepon" id="no_telepon" placeholder="Nomor Telepon" value="{{$info->no_telepon}}">
                                        <span>@error('no_telepon'){{ $message}}

                                            @enderror</span>
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
                                <div class="row mt-2">
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="{{$info->latitude}}">
                                        <span>@error('latitude'){{ $message}}

                                            @enderror</span>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Longitude" value="{{$info->longitude}}">
                                        <span>@error('longitude'){{ $message}}

                                            @enderror</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <!-- <input type="text" class="form-control" name="Longitude" id="Longitude" placeholder="Longitude"> -->
                                        <select class="form-control" name="jam_kunjung" id="jam_kunjung" value="{{$info->jam_kunjung}}">
                                            <span>@error('jam_kunjung'){{ $message}}

                                                @enderror</span>

                                            <!-- <option value="Silakan Pilih Jam Kunjung">Silakan Pilih Jam Kunjung</option> -->
                                            <option>08.00 - 09.00</option>
                                            <option>09.00 - 10.00</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="penyebab" id="penyebab" cols="30" rows="7" placeholder="penyebab gangguan.." value="{{$info->penyebab_gangguan}}">{{$info->penyebab_gangguan}}</textarea>
                                        <span>@error('penyebab'){{ $message}}

                                            @enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="solusi_aktual" id="solusi_aktual" cols="30" rows="7" placeholder="solusi aktual.." value="{{$info->solusi_aktual}}">{{$info->solusi_aktual}}</textarea>
                                        <span>@error('solusi_aktual'){{ $message}}

                                            @enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control" name="masalah" id="masalah" cols="30" rows="7" placeholder="Masalah Pelanggan.." value="{{$info->masalah}}">{{$info->masalah}}</textarea>
                                        <span>@error('masalah'){{ $message}}

                                            @enderror</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <select class="form-control" name="status" id="status">
                                            @if($info->status == 'proses')
                                            <option value=" {{$info->status}}">proses</option>
                                            <option value="complete">Complete</option>
                                            @else
                                            <option value=" {{$info->status}}">complete</option>
                                            <option value="proses">Proces</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Update" class="btn btn-primary rounded-0 py-2 px-4">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>
                            @if (Session::get('Success'))
                            <!-- <div id="form-message-warning mt-4"></div> -->
                            <div class="alert alert-success">
                                {{Session::get('Success')}}
                                <!-- Your message was sent, thank you! -->
                            </div>
                            @endif
                            <!-- <div id="form-message-warning mt-4"></div>
                            <div id="form-message-success">
                                Your message was sent, thank you!
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM&callback=initMap"></script>
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
