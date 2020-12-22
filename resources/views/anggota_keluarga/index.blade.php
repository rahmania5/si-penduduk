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
                            <span class="float-left"><h5>Informasi Kartu Keluarga</h5></span>
                        </div>
                        <div class="col-6">
                        <a href="{{ route('kartu_keluarga.index')}}"><button type="button" class="btn btn-primary float-right">
                            <span class="fas fa-bars"></span> Data Keluarga</button></a>
                        </div>
                    </div>
                </div>

                {{ Form::open(['route' => 'anggotakeluarga.store', 'method' => 'post']) }}
                {{ csrf_field() }}

                {{-- CARD BODY--}}
                <div class="card-body">
                    
                    {{ Form::model($info, []) }}

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="student"><strong>Nomor KK</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('no_kk', null, ['class' => 'form-control-plaintext', 'id' => 'no_kk', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="student"><strong>Jorong</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('jorong_id', $info->jorong->nama, ['class' => 'form-control-plaintext', 'id' => 'jorong_id', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="student"><strong>Nagari</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('nagari_id', $info->jorong->nagari->nama, ['class' => 'form-control-plaintext', 'id' => 'nagari_id', 'readonly' => 'readonly']) }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <h5>Data Anggota Keluarga</h5>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @include('anggota_keluarga.create_form')
                    <div class="col-sm-10">
                        <input type="submit" value="Simpan" class="btn btn-primary float-right"/>
                    </div>
                </div>

                {{ Form::close() }}

                <div class="row justify-content-end">
                    <div class="col-md-6 text-right"></div>
                    <div class="col-md-6 justify-content-end">
                        <div class="row justify-content-end">
                            {{ $anggotakeluargas->links() }}
                        </div>
                    </div>
                </div>

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">NIK</th>
                            <th scope="col" class="text-center">Nama</th>
                            <th scope="col" class="text-center">Jenis Kelamin</th>
                            <th scope="col" class="text-center">Status dalam Keluarga</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($anggotakeluargas as $anggota)
                        <tr>
                            <th scope="row" class="text-center"> {{ $loop->iteration + $anggotakeluargas->firstItem() - 1 }} </th>
                            <td class="text-center">{{ $anggota->nik }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td class="text-center">{{ $anggota->jenis_kelamin }}</td>
                            <td class="text-center">{{ $anggota->status_keluarga }}</td>
                            <td class="text-center">
                            <form method="POST" action="{{ route('anggotakeluarga.destroy', [$anggota->id]) }}">
                                <a href="{{ route('penduduk.show', [$anggota->id]) }}"><button  type="button" class="btn btn-outline-primary"><span class="fas fa-eye"></span></button></a>  
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-outline-danger"><span class="fas fa-trash"></span></button>       
                            </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Data anggota keluarga belum ada
                            </td>
                        </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>