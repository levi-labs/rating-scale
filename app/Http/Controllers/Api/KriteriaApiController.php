<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KriteriaApiController extends Controller
{
    /**
     * Retrieves all Kriteria models and returns them as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse JSON response with status and data properties.
     *                                      - status: bool indicating success or failure.
     *                                      - data: array of App\Models\Kriteria models.
     * @throws \Exception if an error occurs while retrieving the Kriteria models.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $data = \App\Models\Kriteria::all();
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $data = \App\Models\Kriteria::create($request->all());
            return response()->json([
                'message' => 'Data created successfully',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function show($id): JsonResponse
    {
        try {
            $data = \App\Models\Kriteria::find($id);
            return response()->json(
                $data,
                200
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $data = \App\Models\Kriteria::find($id);
            $data->update($request->all());
            return response()->json([
                'message' => 'Data updated successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function destroy($id): JsonResponse
    {
        try {
            $data = \App\Models\Kriteria::find($id);
            $data->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
