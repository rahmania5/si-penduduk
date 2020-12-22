<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Nomor KK</label>
    <div class="col-sm-6">
    {{ Form::text('no_kk', null, ['class' => 'form-control', 'name' => 'no_kk', 'placeholder' => 'Nomor KK']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Jorong</label>
    <div class="col-sm-6">
    {{ Form::select('jorong', $jorongs, null, ['class' => 'form-control', 'name' => 'jorong_id', 'placeholder' => 'Jorong']) }}
    </div>
    <div class="col-sm-2"></div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <label class="col-sm-2 col-form-label">Tanggal Pencatatan</label>
    <div class="col-sm-6">
    {{ Form::date('tgl_pencatatan', null, ['class' => 'form-control', 'name' => 'tgl_pencatatan', 'placeholder' => 'Tanggal Pencatatan']) }}
    </div>
    <div class="col-sm-2"></div>
</div>