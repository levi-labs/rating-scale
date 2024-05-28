<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Nilai;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Nilai Pegawai';
        $data = Nilai::all();
        return view('pages.nilai.index', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $title      = 'Input Nilai Pegawai';
            $pegawai    = DB::table('pegawai')->select('*')
                ->whereNotIn('id', function ($query) {
                    $query->select('pegawai_id')->from('nilai');
                })->get();

            $indikator  = Indikator::all();
            return view('pages.nilai.create', compact('title', 'indikator', 'pegawai'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'indikator_id' => 'required',
            'pegawai_id'   => 'required',

        ]);

        try {
            $id_indikator   = $request->indikator_id;
            $id_pegawai     = $request->pegawai_id;
            $nilai_input    = $request->nilai_indikator;


            for ($i = 0; $i < count($id_indikator); $i++) {
                $indikator = Indikator::where('id', $id_indikator[$i])->first();

                $nilai = new Nilai();
                $nilai->indikator_id = $id_indikator[$i];
                $nilai->pegawai_id = $id_pegawai;
                $nilai->nilai_indikator = $nilai_input[$i];
                $nilai->nilai_hasil     = ($nilai_input[$i] / $indikator->nilai_pembanding) * $indikator->bobot;
                $nilai->tanggal_nilai   = date('Y-m-d');
                $nilai->save();
            }

            return redirect()->route('nilai.index')->with('success', 'Data Berhasil');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage()); //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
