<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-6">
    {{ Form::text('nama', null, ['class' => 'form-control', 'name' => 'nama', 'placeholder' => 'Nama']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Nomor KK</label>
    <div class="col-sm-6">
    {{ Form::text('no_kk', $penduduk->kartu_keluarga->no_kk, ['class' => 'form-control', 'name' => 'no_kk', 'placeholder' => 'Nomor KK']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">NIK</label>
    <div class="col-sm-6">
    {{ Form::text('nik', null, ['class' => 'form-control', 'name' => 'nik', 'placeholder' => 'NIK']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-6">
    {{ Form::select('jenis_kelamin', $jenis_kelamins, null, ['class' => 'form-control', 'name' => 'jenis_kelamin', 'placeholder' => 'Jenis Kelamin']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Tempat Lahir</label>
    <div class="col-sm-6">
    {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'name' => 'tempat_lahir', 'placeholder' => 'Tempat Lahir']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-6">
    {{ Form::date('tgl_lahir', null, ['class' => 'form-control', 'name' => 'tgl_lahir', 'placeholder' => 'Tanggal Lahir']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Agama</label>
    <div class="col-sm-6">
    {{ Form::select('agama', $agamas, null, ['class' => 'form-control', 'name' => 'agama', 'placeholder' => 'Agama']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Level Pendidikan</label>
    <div class="col-sm-6">
    {{ Form::select('level_pendidikan_id', $level_pendidikans, null, ['class' => 'form-control', 'name' => 'level_pendidikan_id', 'placeholder' => 'Level Pendidikan']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
    <div class="col-sm-6">
    {{ Form::select('pekerjaan_id', $pekerjaans, null, ['class' => 'form-control', 'name' => 'pekerjaan_id', 'placeholder' => 'Jenis Pekerjaan']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Status Pernikahan</label>
    <div class="col-sm-6">
    {{ Form::select('status_pernikahan', $stat_pernikahans, null, ['class' => 'form-control', 'name' => 'status_pernikahan', 'placeholder' => 'Status Pernikahan']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Status dalam Keluarga</label>
    <div class="col-sm-6">
    {{ Form::select('status_keluarga', $stat_keluargas, null, ['class' => 'form-control', 'name' => 'status_keluarga', 'placeholder' => 'Status dalam Keluarga']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Kewarganegaraan</label>
    <div class="col-sm-6">
    {{ Form::select('kewarganegaraan_id', $kewarganegaraans, null, ['class' => 'form-control', 'name' => 'kewarganegaraan_id', 'placeholder' => 'Kewarganegaraan']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Ayah</label>
    <div class="col-sm-6">
    {{ Form::text('ayah', null, ['class' => 'form-control', 'name' => 'ayah', 'placeholder' => 'Nama Ayah']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Ibu</label>
    <div class="col-sm-6">
    {{ Form::text('ibu', null, ['class' => 'form-control', 'name' => 'ibu', 'placeholder' => 'Nama Ibu']) }}
    </div>
    <div class="col-sm-2"></div>
</div>