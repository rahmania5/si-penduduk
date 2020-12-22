<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Font Awesome CSS -->
    <script src="https://kit.fontawesome.com/b056a8c538.js" crossorigin="anonymous"></script>
    
</head>

<body>
    @include('navbar')

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <span class="float-left"><h5>Data Keluarga</h5></span>
                        </div>
                        <div class="col-6">
                        <a href="kartukeluarga/create"><button type="button" class="btn btn-primary float-right">
                            <span class="fas fa-plus-circle"></span> Tambah Data</button></a>
                        </div>
                    </div>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right"></div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $keluargas->links() }}
                            </div>
                        </div>
                    </div>
    
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nomor KK</th>
                            <th scope="col" class="text-center">Jorong</th>
                            <th scope="col" class="text-center">Nagari</th>
                            <th scope="col" class="text-center">Tanggal Pencatatan</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($keluargas as $keluarga)
                        <tr>
                            <th scope="row" class="text-center"> {{ $loop->iteration + $keluargas->firstItem() - 1 }} </th>
                            <td class="text-center">{{ $keluarga->no_kk }}</td>
                            <td>{{ $keluarga->jorong->nama }}</td>
                            <td>{{ $keluarga->jorong->nagari->nama }}</td>
                            <td class="text-center">{{ $keluarga->tgl_pencatatan }}</td>
                            <td class="text-center">
                                <a href="anggotakeluarga/{{$keluarga->id}}"><button type="button" class="btn btn-outline-primary"><span class="fas fa-users"></span></button></a>  
                                <a href="kartukeluarga/{{$keluarga->id}}/edit"><button type="button" class="btn btn-outline-warning"><span class="fas fa-edit"></span></button></a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Data keluarga belum ada
                            </td>
                        </tr>

                        @endforelse
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right"></div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $keluargas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>