<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rating') }}
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
                                            <h2>All Rating</h2>
                                        </div>
                                        <div class="date-range-report text-right">
                                            <span></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5 mx-auto card-table table-striped table-responsive table-responsive-large  ">
                                    <table class="table table-sm table-hover">
                                        <thead>
                                            <tr>

                                                <th>#</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Jenis Layanan</th>
                                                <th>Komentar</th>
                                                <th>Rating</th>
                                                <th>Tanggal</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($ratinges as $rat)

                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$rat -> nama_pelanggan}}</td>
                                                <td>{{$rat -> jenis_layanan}}</td>
                                                <td>{{$rat -> komentar}}</td>
                                                <td>{{$rat -> rating}}</td>
                                                <td>{{$rat -> tanggal}}</td>

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
    </div>
</x-app-layout>
