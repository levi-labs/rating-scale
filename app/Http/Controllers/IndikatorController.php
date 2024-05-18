<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title  = 'Indikator Kinerja';
        $data   = Indikator::all();
        return view('pages.indikator.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title      = 'Input Indikator Kinerja';
        $kriteria   = Kriteria::all();
        return view('pages.indikator.create', compact('title', 'kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kriteria_id'       => 'required',
            'nama'              => 'required',
            'bobot'             => 'required',
            'nilai_pembanding'  => 'required',
        ]);

        try {
            $indikator = new Indikator();
            $indikator->kriteria_id       = $request->kriteria_id;
            $indikator->nama              = $request->nama;
            $indikator->bobot             = $request->bobot;
            $indikator->nilai_pembanding  = $request->nilai_pembanding;
            $indikator->save();

            return redirect()->route('indikator.index')->with('success', 'Data Berhasil');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Indikator $indikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indikator $indikator)
    {
        $title      = 'Edit Indikator Kinerja';
        $kriteria   = Kriteria::all();
        $indikator  = Indikator::find($indikator->id);
        return view('pages.indikator.edit', compact('title', 'kriteria', 'indikator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indikator $indikator)
    {
        $this->validate($request, [
            'kriteria_id'       => 'required',
            'nama'              => 'required',
            'bobot'             => 'required',
            'nilai_pembanding'  => 'required',
        ]);

        try {
            $indikator = Indikator::find($indikator->id);
            $indikator->kriteria_id       = $request->kriteria_id;
            $indikator->nama              = $request->nama;
            $indikator->bobot             = $request->bobot;
            $indikator->nilai_pembanding  = $request->nilai_pembanding;
            $indikator->save();

            return redirect()->route('indikator.index')->with('success', 'Data Berhasil');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indikator $indikator)
    {
        $indikator->delete();

        return redirect()->route('indikator.index')->with('success', 'Data Berhasil');
    }
}
