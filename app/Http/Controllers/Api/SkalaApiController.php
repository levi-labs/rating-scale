<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skala;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SkalaApiController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $data = Skala::all();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
    public function store(Request $request): JsonResponse
    {
        $request->validate([

            'nama' => 'required|string',
            'interval' => 'required|string',
            'keterangan' => 'required|string',

        ]);
        try {
            $data = Skala::create($request->all());
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([

            'nama' => 'required|string',
            'interval' => 'required|string',
            'keterangan' => 'required|string',

        ]);
        try {
            $data = Skala::find($id);
            $data->update($request->all());
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $data = Skala::find($id);
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $data = Skala::find($id);
            $data->delete();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}
