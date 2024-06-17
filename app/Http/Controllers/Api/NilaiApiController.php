<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use App\Models\Nilai;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $data = DB::table('nilai')->select('tanggal_nilai')->groupBy('tanggal_nilai')->get();

            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create($tanggal = null)
    {
        try {
            $indikator  = Indikator::query()->with(['kriteria' => function ($query) {
                $query->select('id', 'nama');
            }])->select('id', 'nama', 'bobot', 'nilai_pembanding', 'kriteria_id')->get();
            if ($tanggal != null) {
                $pegawai = DB::table('pegawai')
                    ->select('*')
                    ->whereNotIn('id', function ($query) use ($tanggal) {

                        $year = date('Y', strtotime($tanggal));
                        $month = date('m', strtotime($tanggal));
                        $query->select('pegawai_id')
                            ->from('nilai')
                            ->whereRaw("YEAR(tanggal_nilai) = ? AND MONTH(tanggal_nilai) = ?", [$year, $month]);
                    })
                    ->get();
            } else {
                $pegawai = DB::table('pegawai')
                    ->select('*')
                    ->whereNotIn('id', function ($query) {
                        $query->select('pegawai_id')
                            ->from('nilai')
                            ->whereRaw('YEAR(tanggal_nilai) = YEAR(CURDATE())')
                            ->whereRaw('MONTH(tanggal_nilai) = MONTH(CURDATE())');
                    })
                    ->get();
            }

            return response()->json(['pegawai' => $pegawai, 'indikator' => $indikator], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
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
