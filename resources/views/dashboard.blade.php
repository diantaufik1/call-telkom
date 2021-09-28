<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('Success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{session('Success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="max-w-8x1 mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container-fluid">
                    <div class="row justify-content-end">
                        <div class="col-md-4">
                            <form class="form" action="/dashboard" method="get">
                                <div class=" input-group mt-3">
                                    <input type="text" class="form-control " placeholder="Cari Id Pelanggan.." name="search" id="search">
                                    <div class="input-group-append mb-3">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container-fuild">
                    <div class="row">
                        <div class="col-12">
                            <!-- Recent Order Table -->
                            <div class="card card-table-border-none" id="recent-orders">
                                <div class="card-header justify-content-between">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <h2>All Pengajuan</h2>
                                        </div>
                                        <div class="date-range-report text-right">
                                            <span></span>
                                        </div>
                                        <div class="col-md-6 form-group text-right">
                                            <!-- <button type="button" class="btn btn-secondary text-right text-decoration-none"><a href="print" class="btn-secondary text-decoration-none" target="_blank">cetak</a></button> -->
                                            <button type="button" class="btn btn-secondary text-right text-decoration-none"><a href="printpdf" class="btn-secondary text-decoration-none" target="_blank">PDF</a></button>
                                            <button type="button" class="btn btn-secondary text-right text-decoration-none"><a href="print-excel" class="btn-secondary text-decoration-none" target="_blank">Excel</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5 mx-auto card-table table-striped table-responsive table-responsive-large  ">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id Pelanggan</th>
                                                <th>Kode Antrian</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Nomer Whatsapp dan Telepon</th>
                                                <th>Latitude and Longitude Finder</th>
                                                <th>Jam Kunjung</th>
                                                <th>Jenis Layanan</th>
                                                <th>Penyebab Gangguan</th>
                                                <th>solusi aktual</th>
                                                <th>gaul</th>
                                                <th>Permasalahan</th>
                                                <th>Status</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Selesai Pengajuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Pengajuans as $Pengajuan)
                                            <tr>
                                                <td>{{$Pengajuan -> id_pelanggan}}</td>
                                                <td>{{$Pengajuan -> kode_antrian}}</td>
                                                <td>
                                                    <a class="text-dark" href="">{{$Pengajuan -> nama_pelanggan}}</a>
                                                </td>
                                                <td>{{$Pengajuan -> no_whatsapp}} / {{$Pengajuan -> no_telepon}}</td>
                                                <td>{{$Pengajuan -> latitude}}, {{$Pengajuan -> longitude}}</td>
                                                <td>{{$Pengajuan -> jam_kunjung}}</td>


                                                <td>{{$Pengajuan -> jenis_layanan}}</td>
                                                <td>{{$Pengajuan -> penyebab_gangguan}}</td>
                                                <td>{{$Pengajuan -> solusi_aktual}}</td>
                                                <td>{{$Pengajuan -> gaul}}</td>
                                                <td>{{$Pengajuan -> masalah}}</td>
                                                <td>
                                                    @if ($Pengajuan->status == 'complete')
                                                    <span class="badge badge-success">{{$Pengajuan->status}}</span>
                                                    @else
                                                    <span class="badge badge-warning">{{$Pengajuan->status}}</span>
                                                    @endif
                                                </td>
                                                <td>{{$Pengajuan -> tanggal_pengajuan}}</td>
                                                <td>{{$Pengajuan -> selesai_pengajuan}}</td>

                                                <td class="text-right">
                                                    <!-- <a href="edit/{{$Pengajuan->id}}" class="text-decoration-none btn btn-info">Edit</a>
                                                <a href="kirim/{{$Pengajuan->id}}" class="text-decoration-none btn btn-success">Kirim</a>
                                                <a href="delete/{{$Pengajuan->id}}" class="text-decoration-none btn btn-danger">Remove</a> -->
                                                    <div class="dropdown show d-inline-block widget-dropdown">
                                                        <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                                            <li class="dropdown-item">
                                                                <a href="/edit/{{$Pengajuan->id}}" class="text-decoration-none">Edit</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="kirim/{{$Pengajuan->id}}" class="text-decoration-none">Kirim</a>
                                                            </li>

                                                            <li class="dropdown-item">
                                                                <a href="/delete/{{$Pengajuan->id}}" class="text-decoration-none">Remove</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$Pengajuans->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
