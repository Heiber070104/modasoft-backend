<?php

namespace App\Http\Controllers;

use App\Repositories\AuthRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private AuthRepo $auth
    ) {
    }

    public function login(AuthRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $auth = $this->auth->login($credentials);

        return response()->json([
            'success' => true,
            'message' => 'Incio de sesión exitoso.',
            'user' => $auth['user'],
            'token' => $auth['token'],
        ], 200);
    } 

    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user) {
            $this->auth->logout($user);
        }

        return response()->json([
            'success' => true,
            'message' => 'Sesión cerrada correctamente.',
        ], 200);
    }

    public function me(Request $request): JsonResponse
    {
        $user = $request->user();
        
        return response()->json([
            'success' => true,
            'user' => $this->auth->authenticatedUser($user),
        ], 200);
    }
}
