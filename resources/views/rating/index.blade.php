<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Rating Indihome</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {
            background-color: #D32F2F;
            font-family: 'Calibri', sans-serif !important
        }

        fieldset,
        label {
            margin: 0;
            padding: 0
        }

        body {
            margin: 20px;
        }

        h1 {
            font-size: 1.5em;
            margin: 10px
        }

        .rating {
            border: none;
            margin-right: 49px
        }

        .myratings {
            font-size: 25px;
            color: #FFD700
        }

        .rating>[id^="star"] {
            display: none
        }

        .rating>label:before {
            margin-left: 15px;
            margin-right: 15px;
            font-size: 2.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005"
        }

        .rating>.half:before {
            content: "\f089";
            position: absolute
        }

        .rating>label {
            color: #ddd;
            float: right
        }

        .rating>[id^="star"]:checked~label,
        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: #FFD700
        }

        .rating>[id^="star"]:checked+label:hover,
        .rating>[id^="star"]:checked~label:hover,
        .rating>label:hover~[id^="star"]:checked~label,
        .rating>[id^="star"]:checked~label:hover~label {
            color: #FFED85
        }

        .reset-option {
            display: none
        }

        .reset-button {
            margin: 5px 12px;
            background-color: rgb(255, 255, 255);
            text-transform: uppercase
        }

        .mt-100 {
            margin-top: 100px
        }

        .card {
            position: relative;
            display: flex;
            width: 450px;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: none;
            border-radius: 11px;
            -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
            -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
            box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
        }


        .card .card-body {
            padding: 1rem 1rem
        }

        .card-body {
            flex: 1 1 auto;
            /* padding: 1.25rem */
        }

        p {
            font-size: 14px
        }

        h4 {
            margin-top: 18px
        }

        .btn:focus {
            outline: none
        }

        .btn {
            /* box-shadow: 1px 1px 10px #ddd; */
            width: 100%;
            border-radius: 10px;
            text-transform: capitalize;
            font-size: 20px;
            padding: 8px 19px;
            cursor: pointer;
            color: rgb(247, 243, 243);
            background-color: #cab70b;
            border: none;
        }

        .btn:hover {
            background-color: #e6d119 !important
        }

        .soc {
            padding-right: 10px;
            text-decoration: none;
            color: black;
            transition-duration: 0.3s;
        }

        .soc:hover {
            color: #e6d119;
            text-decoration: none;
        }
    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container bg-white" style="border-radius: 5px;">
        <div class="row">
            <div class="col">
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.famsLi-T96XZViDcmEZJbAHaEK%26pid%3DApi&f=1" width="100" style="margin:10px; float:left;" alt="">
                <img src="https://cdn-2.tstatic.net/wartakota/foto/bank/images/20150929kecewa-layanan-indihome-telkom1_20150929_130844.jpg" width="90" style="margin:10px; float: right;" alt="">
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-3    ">
        <div class="row">
            @if (session('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('Success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-3    ">
        <div class="row">
            <p style="color: aliceblue; font-size: 20px; text-transform: uppercase;">Beri Rating Untuk Pelayanan Indihome !</p>
        </div>
    </div>
    <div class="container d-flex justify-content-center">

        <div class="row">
            <div class="col-md-8">
                <div class="card " style="box-shadow: none; border-radius: none;  background-color: #D32F2F;">
                    <div class="card-body text-center">
                        <form action="{{route('add.rating')}}" method="post">
                            @csrf
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class="full" for="star3" title="Meh - 3 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                <input type="radio" class="reset-option" name="rating" value="reset" />
                            </fieldset>
                            <span>@error('rating')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror</span>
                            <!-- <div class="myratings">4.5</div> -->
                            <input name="name_pelanggan" class="form-control form-control-lg" type="text" placeholder="Masukan Nama Anda.." aria-label=".form-control-lg example">
                            <span style="margin-bottom: 5px;">@error('name_pelanggan')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror</span>

                            <select class="form-control form-control-lg mt-3" name="jenis_l" aria-label=".form-select-lg example">
                                <option value="-">Pilih Layanan Yang Di tangani..</option>
                                <option value="INTERNET">INTERNET</option>
                                <option value="IPTV">IPTV</option>
                                <option value="TELEPON">TELEPON</option>
                            </select>
                            <div class="mb-3 mt-3">
                                <textarea style="font-size: 20px;" name="komentar" class="form-control" id="exampleFormControlTextarea1" placeholder="Masukan Pendapat Anda Tentang Pelayanan Kami.." rows="5"></textarea>
                            </div>
                            <span style="margin-bottom: 5px;">@error('komentar')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror</span>
                            <button type="submit" class="btn btn-light btn-lg">Komentar</button>
                            <hr style="background-color: aliceblue;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-3    ">
        <div class="row">
            <p style="color: aliceblue; font-size: 20px;">| Feedback Dari Pelanggan Indihome ! |</p>
        </div>
    </div>
    <div class="container d-flex justify-content-center body" style="color: rgb(182, 10, 10);
            ">
        <div class="row">
            @foreach ($ratinges as $rating)
            <div class="col-md-12 mb-2 p-3" style="

                    box-shadow: 3px 3px 10px saddlebrown;
                    background-color: rgb(223, 219, 219);">
                <h3>{{$rating -> nama_pelanggan}}</h3>

                @if ($rat = $rating -> rating == 1)
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                @elseif ($rat = $rating -> rating == 2)
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                @elseif ($rat = $rating -> rating == 3)
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                @elseif ($rat = $rating -> rating == 4)
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                @elseif ($rat = $rating -> rating == 5)
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                <span class="bi bi-star-fill" style="color: rgb(206, 188, 23);"></span>
                @endif
                <br>
                <span style="background-color: rgb(136, 147, 156); padding: 3px 8px; border-radius: 5px; font-size: 10px; color: rgb(229, 231, 233);">{{$rating -> jenis_layanan}}</span>
                <p style="font-weight: 50; color: #222;">{{$rating -> komentar}}</p>
                <div class="tanggal" style="text-align: right; font-size: 8px;">{{$rating -> tanggal}}</div>
            </div>
            @endforeach
        </div>
    </div>
    <footer style="width: 100%; height: auto; padding: 10px; margin-top: 50px; text-align: center; background-color: #fff;">
        <span style="margin-top: 10px; text-align:left; padding-right: 20px;">@ PT TELEKOMUNIKASI SELULER, 2022</span>
        <a href="#" class="lead soc">PRIVACY POLICY</a>
        <a href="#" class="lead soc">TERMS OF SERVICE</a>
    </footer>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'>
        $(document).ready(function() {

            $("input[type='radio']").click(function() {
                var sim = $("input[type='radio']:checked").val();
                //alert(sim);
                if (sim < 3) {
                    $('.myratings').css('color', '#FFED85');
                    $(".myratings").text(sim);
                } else {
                    $('.myratings').css('color', '#FFED85');
                    $(".myratings").text(sim);
                }
            });
        });
    </script>
</body>

</html>
