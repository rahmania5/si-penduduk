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
                        <div class="clearfix">
                            <span class="float-left"><h5>Detail Data Penduduk</h5></span>

                            <form method="POST" action="{{$penduduk->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger float-right ml-2">
                            <span class="fas fa-trash"></span> Hapus Data</button>
                        
                            <a href="{{$penduduk->id}}/edit"><button type="button" class="btn btn-warning float-right ml-2">
                            <span class="fas fa-edit"></span> Edit Data</button></a>

                            <a href="create"><button type="button" class="btn btn-primary float-right">
                            <span class="fas fa-plus-circle"></span> Tambah Data</button></a>
                        </div>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                    {{ Form::model($penduduk, []) }}

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="nik"><strong>NIK</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('nik', null, ['class' => 'form-control-plaintext', 'id' => 'nik', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="no_kk"><strong>Nomor Kartu Keluarga</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('keluarga_id', $penduduk->kartu_keluarga->no_kk, ['class' => 'form-control-plaintext', 'id' => 'no_kk', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="nama"><strong>Nama</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('nama', null, ['class' => 'form-control-plaintext', 'id' => 'nama', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="tempat_lahir"><strong>Tempat Lahir</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('tempat_lahir', null, ['class' => 'form-control-plaintext', 'id' => 'tempat_lahir', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="tanggal_lahir"><strong>Tanggal Lahir</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('tgl_lahir', null, ['class' => 'form-control-plaintext', 'id' => 'tanggal_lahir', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('jenis_kelamin', null, ['class' => 'form-control-plaintext', 'id' => 'jenis_kelamin', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="agama"><strong>Agama</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('agama', null, ['class' => 'form-control-plaintext', 'id' => 'agama', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="level_pendidikan"><strong>Level Pendidikan</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('level_pendidikan_id', $penduduk->level_pendidikan->nama, ['class' => 'form-control-plaintext', 'id' => 'level_pendidikan', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="pekerjaan"><strong>Pekerjaan</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('pekerjaan_id', $penduduk->pekerjaan->nama, ['class' => 'form-control-plaintext', 'id' => 'pekerjaan', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="status_pernikahan"><strong>Status Pernikahan</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('status_pernikahan', null, ['class' => 'form-control-plaintext', 'id' => 'status_pernikahan', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="status_keluarga"><strong>Status Keluarga</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('status_keluarga', null, ['class' => 'form-control-plaintext', 'id' => 'status_keluarga', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="kewarganegaraan"><strong>Kewarganegaraan</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('kewarganegaraan_id', $penduduk->kewarganegaraan->nama, ['class' => 'form-control-plaintext', 'id' => 'kewarganegaraan', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="ayah"><strong>Ayah</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('ayah', null, ['class' => 'form-control-plaintext', 'id' => 'ayah', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="ibu"><strong>Ibu</strong></label>
                        <div class="col-sm-10">
                        {{ Form::text('ibu', null, ['class' => 'form-control-plaintext', 'id' => 'ibu', 'readonly' => 'readonly']) }}
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>