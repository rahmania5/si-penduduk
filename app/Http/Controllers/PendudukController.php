<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\LevelPendidikan;
use App\Models\Pekerjaan;
use App\Models\Kewarganegaraan;
use App\Models\Nagari;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduks = Penduduk::with('kartu_keluarga', 'kewarganegaraan')
                    ->paginate(25);

        return view('penduduk.index', compact('penduduks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan1()
    {
        $penduduks = Penduduk::with('kartu_keluarga', 'kewarganegaraan')
                    ->whereRaw('TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) BETWEEN 15 AND 64')
                    ->paginate(25);

        return view('laporan.laporan1', compact('penduduks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan2(Request $request)
    {
        $nagaris = Nagari::all()->pluck('nama','id');
        $id = $request->input('nagari_id');

        if($id) {
            $nagari = Nagari::findOrFail($id);

            $penduduks = $nagari->penduduk()->paginate(25);
            $level_pendidikan = $nagari->penduduk()
                        ->where('level_pendidikan_id', '<', '4')    //filter dan hitung jumlah penduduk dengan pendidikan SMP ke bawah
                        ->count();
            $pendidikan_ts = $nagari->penduduk()
                        ->where('level_pendidikan_id', '=', '1')    //filter pendidikan yang tidak sekolah
                        ->count();
            $pendidikan_sd = $nagari->penduduk()
                        ->where('level_pendidikan_id', '=', '2')    //filter pendidikan SD
                        ->count();
            $pendidikan_smp = $nagari->penduduk()
                        ->where('level_pendidikan_id', '=', '3')    //filter pendidikan SMP
                        ->count();

            return view('laporan.laporan2', compact('nagaris', 'id', 'penduduks', 'level_pendidikan', 'pendidikan_ts', 'pendidikan_sd', 'pendidikan_smp'));
        }
        else {
            $nagari = null;
            $level_pendidikan =  null;
            $pendidikan_ts = null;
            $pendidikan_sd = null;
            $pendidikan_smp = null;
            $penduduks = null;
            return view('laporan.laporan2', compact('nagaris', 'id', 'penduduks', 'level_pendidikan', 'pendidikan_ts', 'pendidikan_sd', 'pendidikan_smp'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level_pendidikans = LevelPendidikan::all()->pluck('nama','id');
        $pekerjaans = Pekerjaan::all()->pluck('nama','id');
        $kewarganegaraans = Kewarganegaraan::all()->pluck('nama','id');
        $agamas = Penduduk::groupBy('agama')->pluck('agama', 'agama');
        $stat_pernikahans = Penduduk::groupBy('status_pernikahan')->pluck('status_pernikahan', 'status_pernikahan');
        $stat_keluargas = Penduduk::groupBy('status_keluarga')->pluck('status_keluarga', 'status_keluarga');
        $jenis_kelamins = Penduduk::groupBy('jenis_kelamin')->pluck('jenis_kelamin', 'jenis_kelamin');

        return view('penduduk.create', compact('level_pendidikans', 'pekerjaans', 'kewarganegaraans', 'agamas', 'stat_pernikahans', 'stat_keluargas', 'jenis_kelamins'));
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

        return redirect()->route('penduduk.show', [$penduduk->id])->with('message', 'Berhasil menambahkan data penduduk baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penduduk = Penduduk::with('kartu_keluarga', 'level_pendidikan', 'pekerjaan', 'kewarganegaraan')
                    ->where('id', $id)
                    ->get();

        $penduduk = $penduduk[0];

        return view('penduduk.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penduduk = Penduduk::with('kartu_keluarga', 'level_pendidikan', 'pekerjaan', 'kewarganegaraan')
                ->findOrFail($id);
        $level_pendidikans = LevelPendidikan::all()->pluck('nama','id');
        $pekerjaans = Pekerjaan::all()->pluck('nama','id');
        $kewarganegaraans = Kewarganegaraan::all()->pluck('nama','id');
        $agamas = Penduduk::groupBy('agama')->pluck('agama', 'agama');
        $stat_pernikahans = Penduduk::groupBy('status_pernikahan')->pluck('status_pernikahan', 'status_pernikahan');
        $stat_keluargas = Penduduk::groupBy('status_keluarga')->pluck('status_keluarga', 'status_keluarga');
        $jenis_kelamins = Penduduk::groupBy('jenis_kelamin')->pluck('jenis_kelamin', 'jenis_kelamin');

        return view('penduduk.edit', compact('penduduk', 'level_pendidikans', 'pekerjaans', 'kewarganegaraans', 'agamas', 'stat_pernikahans', 'stat_keluargas', 'jenis_kelamins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::findOrFail($id);

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

        if($penduduk->save()) {
            return redirect()->route('penduduk.show', [$penduduk->id])->with('message', 'Berhasil memperbarui data penduduk');
        }
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
        
        return redirect()->route('penduduk.index')->with('message', 'Berhasil menghapus data penduduk');
    }
}
