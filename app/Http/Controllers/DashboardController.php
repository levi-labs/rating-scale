<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai;
use App\Models\Kriteria;
use App\Models\Indikator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_user = Auth::guard('web')->user()->email;
        $pegawai    = Pegawai::count();
        $kriteria   = Kriteria::count();
        $indikator  = Indikator::count();

        return view('pages.dashboard.index', compact('data_user', 'pegawai', 'kriteria', 'indikator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
