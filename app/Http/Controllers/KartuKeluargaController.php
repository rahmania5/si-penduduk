<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use App\Models\Jorong;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluargas = KartuKeluarga::with('jorong')
                    ->paginate(25);

        return view('kartu_keluarga.index', compact('keluargas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jorongs = Jorong::all()->pluck('nama','id');
    
        return view('kartu_keluarga.create', compact('jorongs'));
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
            'no_kk' => 'required',
            'jorong_id' => 'required',
            'tgl_pencatatan' => 'required',
        ]);        

        $keluarga = new KartuKeluarga;
        $keluarga->no_kk = $request->input('no_kk');
        $keluarga->jorong_id = $request->input('jorong_id');
        $keluarga->tgl_pencatatan = $request->input('tgl_pencatatan');
        $keluarga->save();
        
        return redirect()->route('kartu_keluarga.index')->with('message', 'Berhasil menambahkan data keluarga baru');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keluarga = KartuKeluarga::with('jorong')->findOrFail($id);
        $jorongs = Jorong::all()->pluck('nama','id');
    
        return view('kartu_keluarga.edit', compact('keluarga', 'jorongs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KartuKeluarga  $kartuKeluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $keluarga = KartuKeluarga::findOrFail($id);

        $request->validate([
            'no_kk' => 'required',
            'jorong_id' => 'required',
            'tgl_pencatatan' => 'required',
        ]);        

        $keluarga->no_kk = $request->input('no_kk');
        $keluarga->jorong_id = $request->input('jorong_id');
        $keluarga->tgl_pencatatan = $request->input('tgl_pencatatan');

        if($keluarga->save()) {
            return redirect()->route('kartu_keluarga.index')->with('message', 'Berhasil memperbarui data keluarga');
        }
    }
}
