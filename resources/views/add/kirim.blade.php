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

                            <h3 class="heading mb-4">{{$Title}} Form Pengajuan ke Telegram</h3>
                            <p><img src="{{asset ('assets/images/logo.png')}}" alt="Image" class="img-fluid"></p>


                        </div>
                        <div class="col-md-6">

                            <form class="mb-6" action="{{route('kirimt')}}" method="post" name="contactForm">
                                @csrf


                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <!-- <input type="text" class="form-control" name="id_pelanggan" id="" placeholder="Your id_pelanggan" value=""> -->
                                        <select class="form-control" name="id_pelanggan" id="id_pelanggan">
                                            @foreach ($tek as $key => $teknik)
                                            <option value="{{$teknik->id_telegram }}">{{$teknik->name_teknisi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="row mt-2">
                                    <input type="hidden" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Your nama_pelanggan" value="{{$info->nama_pelanggan}}">
                                    <input type="hidden" class="form-control" name="no_whatsapp" id="no_whatsapp" placeholder="Nomor Whatsapp" value="{{$info->no_whatsapp}}">
                                    <input type="hidden" class="form-control" name="no_telepon" id="no_telepon" placeholder="Nomor Telepon" value="{{$info->no_telepon}}">
                                    <input type="hidden" class="form-control" name="latitude" id="latitude" placeholder="Latitude" value="{{$info->latitude}}">
                                    <input type="hidden" class="form-control" name="longitude" id="" placeholder="Longitude" value="{{$info->longitude}}">
                                    <input type="hidden" class="form-control" name="jam_kunjung" id="" placeholder="" value="{{$info->jam_kunjung}}">
                                    <input type="hidden" class="form-control" name="kode_antrian" id="" placeholder="kode antrian" value="{{$info->kode_antrian}}">
                                    <input type="hidden" class="form-control" name="jenis_layanan" id="" placeholder="jenis_layanan" value="{{$info->jenis_layanan}}">
                                    <input type="hidden" class="form-control" name="solusi_segmen" id="" placeholder="solusi_segmen" value="{{$info->penyebab_gangguan}}">
                                    <input type="hidden" class="form-control" name="solusi_aktual" id="" placeholder="solusi_aktual" value="{{$info->solusi_aktual}}">
                                    <input type="hidden" class="form-control" name="gaul" id="" placeholder="gaul" value="{{$info->gaul}}">
                                    <input type="hidden" class="form-control" name="masalah" id="" placeholder="" value="{{$info->masalah}}">
                                    <input type="hidden" class="form-control" name="status" id="" placeholder="" value="{{$info->status}}">

                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Kirim" class="btn btn-primary rounded-0 py-2 px-4">
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
