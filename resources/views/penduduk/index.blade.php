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
                            <span class="float-left"><h5>Data Penduduk</h5></span>
                        </div>
                        <div class="col-6">
                            <a href="penduduk/create"><button type="button" class="btn btn-primary float-right">
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
                                {{ $penduduks->links() }}
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
                            <th scope="col" class="text-center">NIK</th>
                            <th scope="col" class="text-center">Nomor KK</th>
                            <th scope="col" class="text-center">Nama</th>
                            <th scope="col" class="text-center">Jenis Kelamin</th>
                            <th scope="col" class="text-center">Kewarganegaraan</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($penduduks as $penduduk)
                        <tr>
                            <th scope="row" class="text-center"> {{ $loop->iteration + $penduduks->firstItem() - 1 }} </th>
                            <td class="text-center">{{ $penduduk->nik }}</td>
                            <td class="text-center">{{ $penduduk->kartu_keluarga->no_kk }}</td>
                            <td>{{ $penduduk->nama }}</td>
                            <td>{{ $penduduk->jenis_kelamin }}</td>
                            <td class="text-center">{{ $penduduk->kewarganegaraan->nama }}</td>
                            <td class="text-center">
                            <form method="POST" action="penduduk/{{$penduduk->id}}">
                                <a href="penduduk/{{$penduduk->id}}"><button  type="button" class="btn btn-outline-primary"><span class="fas fa-eye"></span></button></a>  
                                <a href="penduduk/{{$penduduk->id}}/edit"><button type="button" class="btn btn-outline-warning"><span class="fas fa-edit"></span></button></a>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-outline-danger"><span class="fas fa-trash"></span></button>       
                            </form>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Data penduduk belum ada
                            </td>
                        </tr>

                        @endforelse
                        </tbody>
                    </table>

                    <div class="row justify-content-end">
                        <div class="col-md-6 text-right"></div>
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                                {{ $penduduks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>