<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Penduduk;
use App\Models\Jorong;
use App\Models\LevelPendidikan;
use App\Models\Pekerjaan;
use App\Models\Kewarganegaraan;
use Illuminate\Http\Request;

class AnggotaKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $info = KartuKeluarga::with('jorong')->where('id', $id)->get();
        $info = $info[0];

        $level_pendidikans = LevelPendidikan::all()->pluck('nama','id');
        $pekerjaans = Pekerjaan::all()->pluck('nama','id');
        $kewarganegaraans = Kewarganegaraan::all()->pluck('nama','id');
        $agamas = Penduduk::groupBy('agama')->pluck('agama', 'agama');
        $stat_pernikahans = Penduduk::groupBy('status_pernikahan')->pluck('status_pernikahan', 'status_pernikahan');
        $stat_keluargas = Penduduk::groupBy('status_keluarga')->pluck('status_keluarga', 'status_keluarga');
        $jenis_kelamins = Penduduk::groupBy('jenis_kelamin')->pluck('jenis_kelamin', 'jenis_kelamin');

        $anggotakeluargas = Penduduk::where('keluarga_id', $id)->paginate(10);

        return view('anggota_keluarga.index', compact('info', 'anggotakeluargas', 'level_pendidikans', 'pekerjaans', 'kewarganegaraans', 'agamas', 'stat_pernikahans', 'stat_keluargas', 'jenis_kelamins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'level_pendidikan_id' => 'required',
            'pekerjaan_id' => 'required',
            'status_pernikahan' => 'required',
            'status_keluarga' => 'required',
            'kewarganegaraan_id' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);

        $keluarga_id = KartuKeluarga::where('no_kk', $request->input('no_kk'))->value('id');           

        $penduduk = new Penduduk;
        $penduduk->nama = $request->input('nama');
        $penduduk->keluarga_id = $keluarga_id;
        $penduduk->nik = $request->input('nik');
        $penduduk->jenis_kelamin = $request->input('jenis_kelamin');
        $penduduk->tempat_lahir = $request->input('tempat_lahir');
        $penduduk->tgl_lahir = $request->input('tgl_lahir');
        $penduduk->agama = $request->input('agama');
        $penduduk->level_pendidikan_id = $request->input('level_pendidikan_id');
        $penduduk->pekerjaan_id = $request->input('pekerjaan_id');
        $penduduk->status_pernikahan = $request->input('status_pernikahan');
        $penduduk->status_keluarga = $request->input('status_keluarga');
        $penduduk->kewarganegaraan_id = $request->input('kewarganegaraan_id');
        $penduduk->ayah = $request->input('ayah');
        $penduduk->ibu = $request->input('ibu');
        $penduduk->save();

        return redirect()->route('anggotakeluarga.index', [$penduduk->keluarga_id])->with('message', 'Berhasil menambahkan data anggota keluarga');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::find($id);
        $penduduk->delete();

        return redirect()->route('anggotakeluarga.index', [$penduduk->keluarga_id])->with('message', 'Berhasil menghapus data anggota keluarga');
    }
}
