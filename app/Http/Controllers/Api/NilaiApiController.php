<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use App\Models\Nilai;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NilaiApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            // $data = DB::table('nilai')->select('tanggal_nilai')->groupBy('tanggal_nilai')->get();
            $data = DB::table('nilai')
                ->select(DB::raw('DATE_FORMAT(tanggal_nilai, "%Y-%m") as tanggal_nilai'))
                ->groupBy(DB::raw('DATE_FORMAT(tanggal_nilai, "%Y-%m")'))
                ->get();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function listNilaiByDate($date)
    {
        try {
            $data = DB::table('pegawai')
                ->join('nilai', 'pegawai.id', '=', 'nilai.pegawai_id')
                ->select(
                    'pegawai.id',
                    'pegawai.nama_lengkap',
                    'nilai.tanggal_nilai',
                    DB::raw('SUM(nilai.nilai_hasil) as total_nilai'),
                    DB::raw("CASE 
                    WHEN SUM(nilai.nilai_hasil) > 85 THEN 'A' 
                    WHEN SUM(nilai.nilai_hasil) >= 76 AND SUM(nilai.nilai_hasil) <= 85 THEN 'B'
                    WHEN SUM(nilai.nilai_hasil) >= 61 AND SUM(nilai.nilai_hasil) <= 75 THEN 'C'
                    WHEN SUM(nilai.nilai_hasil) >= 46 AND SUM(nilai.nilai_hasil) <= 60 THEN 'D'
                    WHEN SUM(nilai.nilai_hasil) >= 0 AND SUM(nilai.nilai_hasil) <= 45 THEN 'E' 
                    
                END as skala"),
                    DB::raw("CASE 
                    WHEN SUM(nilai.nilai_hasil) > 85 THEN 'Sangat Baik' 
                    WHEN SUM(nilai.nilai_hasil) >= 76 AND SUM(nilai.nilai_hasil) <= 85 THEN 'Baik'
                    WHEN SUM(nilai.nilai_hasil) >= 61 AND SUM(nilai.nilai_hasil) <= 75 THEN 'Cukup Baik'
                    WHEN SUM(nilai.nilai_hasil) >= 46 AND SUM(nilai.nilai_hasil) <= 60 THEN 'Buruk'
                    WHEN SUM(nilai.nilai_hasil) >= 0 AND SUM(nilai.nilai_hasil) <= 45 THEN 'Sangat Kurang' 
                    
                END as keterangan")
                )
                ->whereYear('tanggal_nilai', '=', date('Y', strtotime($date)))
                ->whereMonth('tanggal_nilai', '=', date('m', strtotime($date)))
                ->groupBy('pegawai_id', 'tanggal_nilai')
                ->get();
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
            }])
                ->select('id', 'nama', 'bobot', 'nilai_pembanding', 'kriteria_id')
                ->get();
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
                $tanggal = date('Y-m-d');
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
            $data = [
                'indikator' => $indikator,
                'pegawai' => $pegawai,
                'tanggal_nilai' => $tanggal,
            ];
            return response()->json($data, 200);
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
        $validator = Validator::make($request->all(), [
            'indikator_id' => 'required',
            'pegawai_id' => 'required',
            'nilai_input' => 'required',
            'tanggal_nilai' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }

        try {
            $indikator_id   = json_decode($request->indikator_id, true);
            $pegawai_id     = $request->pegawai_id;
            $nilai_input    = json_decode($request->nilai_input, true);

            $tanggal        = $request->tanggal_nilai;
            $date           = date('Y-m');


            if ($tanggal != null) {
                $year = date('Y', strtotime($tanggal));
                $month = date('m', strtotime($tanggal));
                $get_last_row = DB::table('nilai')
                    ->select('tanggal_nilai')
                    ->whereRaw("YEAR(tanggal_nilai) = ? AND MONTH(tanggal_nilai) = ?", [$year, $month])
                    ->get()
                    ->last();

                for ($i = 0; $i < count($indikator_id); $i++) {
                    $indikator = Indikator::find($indikator_id[$i]);
                    $nilai   = new Nilai();
                    $nilai->indikator_id = $indikator_id[$i];
                    $nilai->pegawai_id = $pegawai_id;
                    $nilai->tanggal_nilai = $get_last_row->tanggal_nilai;
                    $nilai->nilai_indikator = $nilai_input[$i];
                    $nilai->nilai_hasil = ($nilai_input[$i] / $indikator->nilai_pembanding) * $indikator->bobot;
                    $nilai->save();
                }
                return response()->json([
                    'message' => 'Data Berhasil Ditambahkan',
                    'data' => [
                        'pegawai_id' => $pegawai_id,
                        'indikator_id' => $indikator_id,
                        'tanggal' => $get_last_row->tanggal_nilai,
                        'nilai_input' => $nilai_input
                    ]
                ], 200);
            } else {
                $date = date('Y-m-d');

                for ($i = 0; $i < count($indikator_id); $i++) {
                    $indikator = Indikator::find($indikator_id[$i]);
                    $nilai   = new Nilai();
                    $nilai->indikator_id = $indikator_id[$i];
                    $nilai->pegawai_id = $pegawai_id;
                    $nilai->tanggal_nilai = $date;
                    $nilai->nilai_indikator = $nilai_input[$i];
                    $nilai->nilai_hasil = ($nilai_input[$i] / $indikator->nilai_pembanding) * $indikator->bobot;
                    $nilai->save();
                }

                return response()->json([
                    'message' => 'Data Berhasil Ditambahkan',
                    'data' => [
                        'pegawai_id' => $pegawai_id,
                        'indikator_id' => $indikator_id,
                        'tanggal' => $date,
                        'nilai_input' => $nilai_input
                    ]
                ], 200);
            }
        } catch (\Exception $th) {
            return response()->json([
                'error' => $th->getMessage()
            ], 500);
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
