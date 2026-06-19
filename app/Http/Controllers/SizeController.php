<?php

namespace App\Http\Controllers;

use App\Repositories\SizeRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\Http\Resources\SizeResource;

class SizeController extends Controller{

    public function __construct( 
        private SizeRepo $sizeRepo
    ){}

    public function index(Request $request): JsonResponse{

        $sizes = $this->sizeRepo->getPaginated([
            'per_page' => $request->input('per_page', 15),
            'search' => $request->input('search', ''),
            'sort_by' => $request->input('sort_by', 'id'),
            'sort_dir' => $request->input('sort_dir', 'asc'),
        ]);

        return response()->json([
            'success' => true,
            'data' => SizeResource::collection($sizes->items()),
            'meta' => [
                'total' => $sizes->total(),
                'per_page' => $sizes->perPage(),
                'current_page' => $sizes->currentPage(),
                'last_page' => $sizes->lastPage(),
                'from' => $sizes->firstItem(),
                'to' => $sizes->lastItem(),
            ],
        ]);
    }

    public function getById(int $id): JsonResponse{
        $size = $this->sizeRepo->getById($id);

        return response()->json([
            'success' => true,
            'size' => SizeResource::make($size),
        ], 200);
    }

    public function store(SizeRequest $request): JsonResponse{
        $size = $this->sizeRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'size' => SizeResource::make($size),
        ], 201);
    }

    public function update(int $id, SizeRequest $request): JsonResponse{
        $size = $this->sizeRepo->update($id, $request->validated());

        if (!$size) {
            return response()->json([
                'success' => false,
                'message' => 'Size not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'size' => SizeResource::make($size),
        ], 200);
    }

    public function destroy(int $id): JsonResponse{
        $deleted = $this->sizeRepo->delete($id);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Size not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Size deleted successfully',
        ], 200);
    }

}