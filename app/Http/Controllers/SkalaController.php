<?php

namespace App\Http\Controllers;

use App\Models\Skala;
use Illuminate\Http\Request;

class SkalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title      = 'Skala Page';
        $data       = Skala::all();

        return view('pages.skala.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Skala Page';
        return view('pages.skala.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required',
            'interval'      => 'required',
            'keterangan'    => 'required',
        ]);

        Skala::create($request->all());

        return redirect()->route('skala.index')->with('success', 'Skala Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Skala $skala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skala $skala)
    {
        $title = 'Edit Skala Page';
        return view('pages.skala.edit', compact('title', 'skala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skala $skala)
    {
        $request->validate([
            'nama'         => 'required',
            'interval'      => 'required',
            'keterangan'    => 'required',
        ]);

        $skala->update($request->all());

        return redirect()->route('skala.index')->with('success', 'Skala Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skala $skala)
    {
        $skala->delete();

        return redirect()->route('skala.index')->with('success', 'Skala Berhasil');
    }
}
