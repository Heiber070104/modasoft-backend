<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller{

    public function __construct( 
        private CategoryRepo $categoryRepo
    ){}

    public function index(Request $request): JsonResponse{

        $paginated = $request->input('paginated', true);

        $categories = $this->categoryRepo->getPaginated([
            'per_page' => $request->input('per_page', 15),
            'search' => $request->input('search', ''),
            'sort_by' => $request->input('sort_by', 'id'),
            'sort_dir' => $request->input('sort_dir', 'asc'),
            'is_active' => $request->input('is_active', null),
            'paginated' => $paginated,
        ]);

        if(!$paginated){
            return response()->json([
                'success' => true,
                'data' => $categories,
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => CategoryResource::collection($categories->items()),
            'meta' => [
                'total' => $categories->total(),
                'per_page' => $categories->perPage(),
                'current_page' => $categories->currentPage(),
                'last_page' => $categories->lastPage(),
                'from' => $categories->firstItem(),
                'to' => $categories->lastItem(),
            ],
        ]);
    }

    public function getById(int $id): JsonResponse{
        $category = $this->categoryRepo->getById($id);

        return response()->json([
            'success' => true,
            'category' => CategoryResource::make($category),
        ], 200);
    }

    public function store(CategoryRequest $request): JsonResponse{
        $category = $this->categoryRepo->create($request->validated());

        return response()->json([
            'success' => true,
            'category' => CategoryResource::make($category),
        ], 201);
    }

    public function update(int $id, CategoryRequest $request): JsonResponse{
        $category = $this->categoryRepo->update($id, $request->validated());

        return response()->json([
            'success' => true,
            'category' => CategoryResource::make($category),
        ], 200);
    }

    public function toggleStatus(int $id): JsonResponse{
        $category = $this->categoryRepo->toggleStatus($id);

        return response()->json([
            'success' => true,
            'category' => CategoryResource::make($category),
        ], 200);
    }

    public function destroy(int $id): JsonResponse{
        $this->categoryRepo->delete($id);

        return response()->json([
            'success' => true,
            'message' => "La categoría ha sido eliminada correctamente.",
        ], 200);
    }
}