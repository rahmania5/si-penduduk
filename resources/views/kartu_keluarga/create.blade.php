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
                    <h5>Tambah Data Keluarga</h5>
                </div>

                {{ Form::open(['route' => 'kartu_keluarga.store', 'method' => 'post']) }}
                {{ csrf_field() }}

                {{-- CARD BODY--}}
                <div class="card-body">
                    @include('kartu_keluarga.create_form')                
                
                    <div class="col-sm-10">
                        <input type="submit" value="Simpan" class="btn btn-primary float-right mb-3"/>
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</body>
</html>