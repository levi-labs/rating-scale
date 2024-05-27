<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Daftar Pegawai';
        $data = Pegawai::all();
        return view('pages.pegawai.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Form Input Pegawai';
        return view('pages.pegawai.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'no_handphone' => 'required',
            'divisi' => 'required',
            'email' => 'required',

        ]);
        $data = new Pegawai();
        $data->nama_lengkap = $request->nama;
        $data->jabatan = $request->divisi;
        $data->email = $request->email;
        $data->no_hp = $request->no_handphone;
        $data->nip = $request->nip;
        $data->alamat = $request->alamat;
        $data->save();
        return redirect('/pegawai')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        $title = 'Form Edit Pegawai';

        return view('pages.pegawai.edit', compact('title', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'no_handphone' => 'required',
            'divisi' => 'required',
            'email' => 'required',
        ]);
        $data = Pegawai::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->save();
        return redirect('/pegawai')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('/pegawai')->with('success', 'Data Berhasil Dihapus');
    }
}
