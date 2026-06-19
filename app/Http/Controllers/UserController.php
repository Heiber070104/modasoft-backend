<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private UserRepo $userRepo
    ) {
    }

    public function index(Request $request): JsonResponse
    {
        $users = $this->userRepo->getPaginated(
            [
                'per_page' => $request->input('per_page', 15),
                'search' => $request->input('search', ''),
                'sort_by' => $request->input('sort_by', 'id'),
                'sort_dir' => $request->input('sort_dir', 'asc'),
            ],
            $request->user()
        );

        return response()->json([
            'success' => true,
            'data' => UserResource::collection($users->items()),
            'meta' => [
                'total' => $users->total(),
                'per_page' => $users->perPage(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem(),
            ],
        ]);
    }

    public function getById(int $id): JsonResponse
    {
        $user = $this->userRepo->getById($id);

        return response()->json([
            'success' => true,
            'user' => UserResource::make($user),
        ], 200);
    }

    public function getByEmail(string $email): JsonResponse
    {
        $user = $this->userRepo->getByEmail($email);

        return response()->json([
            'success' => true,
            'user' => UserResource::make($user),
        ], 200);
    }

    public function store(UserRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = $this->userRepo->create($data);

        return response()->json([
            'success' => true,
            'message' => 'Usuario creado exitosamente.',
            'user' => UserResource::make($user),
        ], 201);
    }

    public function update(UserRequest $request, int $id): JsonResponse
    {
        $data = $request->validated();
        $user = $this->userRepo->update($id, $data);

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Usuario actualizado exitosamente.',
            'user' => UserResource::make($user),
        ], 200);
    }

    public function toggleStatus(int $id): JsonResponse
    {
        $user = $this->userRepo->toggleStatus($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Estado del usuario actualizado exitosamente.',
            'user' => UserResource::make($user),
        ], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->userRepo->delete($id);

        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Usuario eliminado exitosamente.',
        ], 200);
    }

}
