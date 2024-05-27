<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PegawaiApiController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $data = Pegawai::all();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {

        $request->validate([
            'nama_lengkap' => 'required|string',
            'nip' => 'required|string',
            'jabatan' => 'required|string',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|string',

        ]);
        try {
            $data = new Pegawai();
            $data->fill($request->all());
            $data->save();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $data = Pegawai::find($id);
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'nama_lurator' => 'required|string',
            'nip' => 'required|string',
            'jabatan' => 'required|string',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|string',
        ]);

        try {
            $data = Pegawai::find($id);
            $data->fill($request->all());
            $data->save();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $data = Pegawai::find($id);
            $data->delete();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
