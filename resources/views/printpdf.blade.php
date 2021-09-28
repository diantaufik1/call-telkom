<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="view" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                    <div class="col-12">
                        <!-- Recent Order Table -->
                        <div class="card card-table-border-none" id="recent-orders">
                            <div class="card-header justify-content-between">
                                <h2 style="display: inline-block;">Laporan</h2>

                                <div class="date-range-report text-right">
                                    <span class="date-range-report">Date : {{date('Y-m-d H:i')}}</span>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-5">
                                <table class="table card-table table-responsive table-responsive-large">
                                    <thead>
                                        <tr>
                                            <th>Kode Antrian</th>
                                            <th>Name</th>
                                            <th>Nomer Handphone</th>
                                            <th>Latitude and Longitude Finder</th>
                                            <th>Permasalahan</th>
                                            <th>Tanggal</th>
                                            <!-- <th>Status</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Pengajuans as $Pengajuan)
                                        <tr>
                                            <td>{{$Pengajuan -> kodeAntrian}}</td>
                                            <td>
                                                <a class="text-dark" href="">{{$Pengajuan -> name}}</a>
                                            </td>
                                            <td>{{$Pengajuan -> noWhatsapp}} / {{$Pengajuan -> noTelepon}}</td>
                                            <td>{{$Pengajuan -> latitude}}, {{$Pengajuan -> longitude}}</td>
                                            <td>{{$Pengajuan -> masalah}}</td>
                                            <td>{{$Pengajuan -> tanggal_pengajuan}}</td>
                                            <!-- <td>
                                                <span class="badge badge-warning">{{$Pengajuan->status}}</span>
                                            </td> -->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>

</html>
