<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Teknisi <b></b>
            <b style="float:right;">
                <span class="badge badge-danger"></span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">

            @if (session('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('Success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Edit Teknisi</div>
                        <div class="card-body">
                            <form action="{{url('teknisi/update/'.$teknisis->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="id_telegram">Update ID Teknisi</label>
                                    <input type="name" name="id_telegram" class="form-control" id="id_telegram" aria-describedby="id_telegram" value="{{$teknisis->id_telegram}}">
                                    @error('id_telegram')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_teknisi">Update Name Teknisi</label>
                                    <input type="name" name="name_teknisi" class="form-control" id="name_teknisi" value="{{$teknisis->name_teknisi}}">
                                    @error('name_teknisi')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
