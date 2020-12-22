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
                            <span class="float-left"><h5>Data Penduduk Berdasarkan Nagari</h5></span>
                        </div>
                    </div>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                    <form method="GET" action="{{ route('laporan.laporan2') }}">
                        {{ csrf_field() }}
                    
                        <div class="form-group row">
                            <label class="col-sm-1 col-form-label">Nagari</label>
                            <div class="col-sm-6">
                            {{ Form::select('nagari_id', $nagaris, $id, ['class' => 'form-control', 'name' => 'nagari_id', 'placeholder' => 'Pilih Nagari']) }}
                            </div>
                            <button type="submit" class="btn btn-primary"><span class="fas fa-search"></span> Tampilkan Data</button>       
                        </div>
                    </form>

                    <div class="col-md-6 text-left">
                            @if($level_pendidikan)
                            <p>Jumlah penduduk dengan tingkat pendidikan SMP ke bawah adalah <strong>{{ $level_pendidikan }} orang</strong></p>
                            @endif
                    </div>

                    @if($pendidikan_ts || $pendidikan_sd || $pendidikan_smp) 
                    <table class="table">
                        <thead>
                        <tr class="d-flex">
                            <th scope="col" class="text-center col-1">No</th>
                            <th scope="col" class="text-center col-4">Level Pendidikan</th>
                            <th scope="col" class="text-center col-2">Jumlah</th>
                        </tr>
                        <tr class="d-flex">
                            <td scope="row" class="text-center col-1">1</td>
                            <td class="text-center col-4">Tidak Sekolah</td>
                            <td class="text-center col-2">{{ $pendidikan_ts }}</td>
                        </tr>
                        <tr class="d-flex">
                            <td scope="row" class="text-center col-1">2</td>
                            <td class="text-center col-4">SD</td>
                            <td class="text-center col-2">{{ $pendidikan_sd }}</td>
                        </tr>
                        <tr class="d-flex mb-2">
                            <td scope="row" class="text-center col-1">3</td>
                            <td class="text-center col-4">SMP</td>
                            <td class="text-center col-2">{{ $pendidikan_smp }}</td>
                        </tr>
                        </thead>
                    </table>
                    @endif

                    <div class="row justify-content-end">
                        <div class="col-md-6 justify-content-end">
                            <div class="row justify-content-end">
                            @if($penduduks)    
                                {{ $penduduks->links() }}
                            </div>
                        </div>
                    </div>
    
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">NIK</th>
                            <th scope="col" class="text-center">Nomor KK</th>
                            <th scope="col" class="text-center">Nama</th>
                            <th scope="col" class="text-center">Jenis Kelamin</th>
                            <th scope="col" class="text-center">Level Pendidikan</th>
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
                            <td class="text-center">{{ $penduduk->level_pendidikan->nama }}</td>
                            <td class="text-center">
                                <a href="{{ route('penduduk.show', [$penduduk->id]) }}"><button type="button" class="btn btn-outline-primary"><span class="fas fa-eye"></span></button></a>  
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
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>