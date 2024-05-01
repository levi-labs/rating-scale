<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Kriteria Page';
        $data  = Kriteria::all();

        return view('pages.kriteria.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Kriteria Page';

        return view('pages.kriteria.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);

        try {
            $kriteria = new Kriteria();
            $kriteria->nama = $request->nama;
            $kriteria->save();

            return redirect()->route('kriteria.index')->with('success', 'Kriteria has been created');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        $title = 'Edit Kriteria Page';
        $kriteria = Kriteria::find($kriteria->id);

        return view('pages.kriteria.edit', compact('title', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);
        try {
            $kriteria = Kriteria::find($kriteria->id);
            $kriteria->update([
                'nama' => $request->nama
            ]);
            return redirect()->route('kriteria.index')->with('success', 'Kriteria has been updated');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria = Kriteria::findOrFail($kriteria->id);
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Kriteria has been deleted');
    }
}
