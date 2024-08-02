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
    public function index(Request $request)
    {
        session()->forget('tanggal');
        $title = 'Nilai Pegawai';
        $searchValue = $request->search;
        $year = date('Y', strtotime($searchValue));
        $month = date('m', strtotime($searchValue));
        if ($request->search) {
            $data = DB::table('nilai')
                ->select(DB::raw('DATE_FORMAT(tanggal_nilai, "%Y-%m") as tanggal_nilai'))
                ->whereYear('tanggal_nilai', '=', $year)
                ->whereMonth('tanggal_nilai', '=', $month)
                ->groupBy(DB::raw('DATE_FORMAT(tanggal_nilai, "%Y-%m")'))
                ->get();
            return view('pages.nilai.index', compact('data', 'title'));
        } else {
            $data = DB::table('nilai')
                ->select(DB::raw('DATE_FORMAT(tanggal_nilai, "%Y-%m") as tanggal_nilai'))
                ->groupBy(DB::raw('DATE_FORMAT(tanggal_nilai, "%Y-%m")'))
                ->get();
            return view('pages.nilai.index', compact('data', 'title'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title      = 'Input Nilai Pegawai';
        try {
            $indikator  = Indikator::all();
            if (session()->has('tanggal')) {
                $pegawai = DB::table('pegawai')
                    ->select('*')
                    ->whereNotIn('id', function ($query) {
                        $tanggal = session()->get('tanggal');
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
                if (session()->has('tanggal')) {
                    $nilai->tanggal_nilai = session()->get('tanggal');
                } else {
                    $nilai->tanggal_nilai   = date('Y-m-d');
                }
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
    public function show($tanggal)
    {
        $sessionTanggal = session()->put('tanggal', $tanggal);
        $title = 'Nilai Pegawai';
        $explode = explode('-', $tanggal);
        $year = $explode[0];
        $month = $explode[1];
        $searchValue = $tanggal;
        $year = date('Y', strtotime($searchValue));
        $month = date('m', strtotime($searchValue));
        $data = DB::table('pegawai')
            ->join('nilai', 'pegawai.id', '=', 'nilai.pegawai_id')
            ->select(
                'pegawai.id',
                'pegawai.nama_lengkap',
                DB::raw('DATE_FORMAT(tanggal_nilai, "%Y-%m") as tanggal_nilai'),
                DB::raw('SUM(nilai.nilai_hasil) as total_nilai')
            )
            ->whereYear('tanggal_nilai', $year)
            ->whereMonth('tanggal_nilai', $month)
            ->groupBy('pegawai.id', 'tanggal_nilai')
            ->get();

        return view('pages.nilai.show', compact('data', 'title'));
    }

    public function detail($id)
    {

        $title = 'Nilai Detail Pegawai';
        $date = session()->get('tanggal');
        $explode = explode('-', $date);
        $year = $explode[0];
        $month = $explode[1];

        try {
            $tanggal = session()->get('tanggal');
            $nama = DB::table('pegawai')->where('id', $id)->first()->nama_lengkap;
            $data = DB::table('pegawai')
                ->join('nilai', 'pegawai.id', '=', 'nilai.pegawai_id')
                ->join('indikators', 'indikators.id', '=', 'nilai.indikator_id')
                ->select(
                    'pegawai.id',
                    'pegawai.nama_lengkap',
                    'nilai.nilai_indikator',
                    'nilai.nilai_hasil',
                    'indikators.nama as indikator',
                    DB::raw('DATE_FORMAT(tanggal_nilai, "%Y-%m") as tanggal_nilai'),
                    // DB::raw('SUM(nilai.nilai_hasil) as total_nilai')
                )
                ->where('pegawai_id', $id)
                ->whereYear('tanggal_nilai', $year)
                ->whereMonth('tanggal_nilai', $month)
                ->get();



            return view('pages.nilai.detail-nilai', compact('data', 'title', 'nama', 'tanggal'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        // dd($nilai->pegawai_id);
        $tanggal = session()->get('tanggal');
        $resultDate = $this->generateDateYearAndMonth($tanggal);


        $title = 'Edit Nilai';


        try {
            $pegawai = DB::table('pegawai')->get();
            $indikator = Indikator::all();
            $nilais = Nilai::select(
                'id',
                'pegawai_id',
                'indikator_id',
                'nilai_indikator',
                DB::raw('DATE_FORMAT(tanggal_nilai, "%Y-%m") as tanggal_nilai'),
            )
                ->whereYear('tanggal_nilai', $resultDate[0])
                ->whereMonth('tanggal_nilai', $resultDate[1])
                ->where('pegawai_id', $nilai->pegawai_id)
                ->get();


            return view('pages.nilai.edit', compact('title', 'nilai', 'pegawai', 'indikator', 'nilais'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {


        try {
            $id             = $request->id;
            $id_indikator   = $request->indikator_id;
            $id_pegawai     = $request->pegawai_id;
            $nilai_input    = $request->nilai_indikator;

            // dd($request->all());
            for ($i = 0; $i < count($id); $i++) {
                $indikator = Indikator::where('id', $id_indikator[$i])->first();
                $nilais = Nilai::where('id', $id[$i])->first();
                $nilais->nilai_indikator = $nilai_input[$i];
                $hasil = ($nilai_input[$i] / $indikator->nilai_pembanding) * $indikator->bobot;
                $nilais->nilai_hasil     = $hasil;
                $nilais->save();
            }

            return redirect()->route('nilai.index')->with('success', 'Data Berhasil diupdate');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage()); //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        try {
            if ($nilai->pegawai_id && session()->has('tanggal')) {
                Nilai::where('pegawai_id', $nilai->pegawai_id)->where('tanggal_nilai', session()->get('tanggal'))->delete();
            }
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    protected function generateDateYearAndMonth($date)
    {
        $year = explode('-', $date)[0];
        $month = explode('-', $date)[1];
        return [$year, $month];
    }
}
