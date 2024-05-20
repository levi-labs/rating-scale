<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use App\Models\Kriteria;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardApiController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $pegawai    = Pegawai::count();
            $kriteria   = Kriteria::count();
            $indikator  = Indikator::count();
            $user       = User::count();
            $data       = [
                'pegawai'    => $pegawai,
                'kriteria'   => $kriteria,
                'indikator'  => $indikator,
                'user'       => $user
            ];
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
