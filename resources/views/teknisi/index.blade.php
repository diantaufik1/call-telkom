<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Teknisi <b></b>
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">All Teknisi</div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Id Telegram </th>
                                    <th scope="col">Name Teknisi</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teknisies as $teknisi )
                                <tr>
                                    <th scope="row">{{$teknisies->firstItem()+$loop->index}}</th>
                                    <td>{{$teknisi->id_telegram}}</td>
                                    <td>{{$teknisi->name_teknisi}}</td>
                                    <td>
                                        <a href="/teknisi/edit/{{$teknisi->id}}" class="btn btn-info">Edit</a>
                                        <a href="/teknisi/delete/{{$teknisi->id}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$teknisies->links()}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Teknisi</div>
                        <div class="card-body">
                            <form action="{{route('add.teknisi')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="id_telegram">ID Teknisi</label>
                                    <input type="name" name="id_telegram" class="form-control" id="id_telegram" aria-describedby="id_telegram">
                                    @error('id_telegram')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_teknisi">Name Teknisi</label>
                                    <input type="name" name="name_teknisi" class="form-control" id="name_teknisi">
                                    @error('name_teknisi')
                                    <span class="text-danger">{{$message}}</span>

                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
