<?php

namespace App\Http\Controllers;

use App\Repositories\ThirdPartyRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;
use App\Http\Resources\SupplierResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Enums\ThirdPartyType;

class SupplierController extends Controller{

    protected $type = ThirdPartyType::SUPPLIER->value;

    public function __construct(
        private ThirdPartyRepo $repo 
    ) {}

    public function index(Request $request): JsonResponse{

        $suppliers = $this->repo->getPaginated($this->type, [
            'per_page' => $request->input('per_page', 15),
            'search' => $request->input('search', ''), 
            'sort_by' => $request->input('sort_by', 'id'),
            'sort_dir' => $request->input('sort_dir', 'asc'),
        ]);

        return response()->json([
            'success' => true,
            'data' => SupplierResource::collection($suppliers->items()),
            'meta' => [
                'total' => $suppliers->total(),
                'per_page' => $suppliers->perPage(),
                'current_page' => $suppliers->currentPage(),
                'last_page' => $suppliers->lastPage(),
                'from' => $suppliers->firstItem(),
                'to' => $suppliers->lastItem(),
            ],
        ]);
    }

    public function getById(int $id): JsonResponse{
        $supplier = $this->repo->getById($this->type, $id);

        return response()->json([
            'success' => true,
            'supplier' => SupplierResource::make($supplier),
        ], 200);
    }

    public function store(SupplierRequest $request): JsonResponse{
        $supplier = $this->repo->create($this->type, $request->validated());

        return response()->json([
            'success' => true,
            'supplier' => SupplierResource::make($supplier),
        ], 201);
    }

    public function update(int $id, SupplierRequest $request): JsonResponse{
        $supplier = $this->repo->update($this->type, $id, $request->validated());

        return response()->json([
            'success' => true,
            'supplier' => SupplierResource::make($supplier),
        ], 200);
    }

    public function destroy(int $id): JsonResponse{
        $deleted = $this->repo->delete($this->type, $id);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Supplier not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Supplier deleted successfully',
        ], 200);
    }

}