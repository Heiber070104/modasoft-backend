<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthRepo
{
    public function __construct(
        private User $user
    ) {
    }

    public function login(array $credentials): array
    {
        $user = $this->user
            ->where('email', $credentials['email'])
            ->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'credentials' => ['Credenciales incorrectas.'],
            ]);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return [
            'user' => $this->authenticatedUser($user),
            'token' => $token,
        ];
    }

    public function authenticatedUser(User $user): array
    {
        $user->load('roles.permissions');

        return [
            'id' => $user->id,
            'username' => $user->username,
            'personal_name' => $user->personal_name,
            'email' => $user->email,
            'roles' => $user->getRoleNames()->values(),
            'permissions' => $user->getAllPermissions()->pluck('name')->values(),
        ];
    }

    public function logout(User $user): bool
    {
        if ($user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
            return true;
        }

        return false;
    }

}
