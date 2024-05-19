<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndikatorApiController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $indikator  = Indikator::all();
            return response()->json([
                'data' => $indikator,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $indikator = Indikator::create($request->all());
            return response()->json([
                'message' => 'Indikator created successfully',
                'data' => $indikator
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $indikator = Indikator::find($id);
            return response()->json(
                $indikator,
                200
            );
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        try {
            $indikator = Indikator::find($id);
            $indikator->update($request->all());
            return response()->json([
                'message' => 'Indikator updated successfully',
                'data' => $indikator
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $indikator = Indikator::find($id);
            $indikator->delete();
            return response()->json([
                'message' => 'Indikator deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
