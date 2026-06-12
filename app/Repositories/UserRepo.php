<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class UserRepo
{
    public function __construct(
        private User $user
    ) {
    }

    public function getPaginated(array $params = [])
    {
        $query = $this->user->query()->with(['roles']);

        if (!empty($params['search'])) {
            $query->where('username', 'ilike', '%' . $params['search'] . '%')
                ->orWhere('personal_name', 'ilike', '%' . $params['search'] . '%')
                ->orWhere('email', 'ilike', '%' . $params['search'] . '%');
        }

        if (!empty($params['sort_by']) && in_array($params['sort_by'], ['id', 'username', 'personal_name', 'email'])) {
            $sortDir = !empty($params['sort_dir']) && in_array(strtolower($params['sort_dir']), ['asc', 'desc']) ? $params['sort_dir'] : 'asc';
            $query->orderBy($params['sort_by'], $sortDir);
        }

        return $query->paginate($params['per_page'] ?? 15);
    }

    public function getById(int $id): ?User
    {
        return $this->user->find($id);
    }

    public function getByEmail(string $email): ?User
    {
        return $this->user->where('email', $email)->first();
    }

    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->user->create($data);
        $user->syncRoles([$data['role']]);
        return $user;
    }

    public function update(int $id, array $data): ?User
    {
        $user = $this->getById($id);

        if (!$user) {
            return null;
        }

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);
        if (isset($data['role'])) {
            $user->getRoleNames()->each(fn ($role) => $user->removeRole($role));
            $user->syncRoles([$data['role']]);
        }
        return $user;
    }

    public function delete(int $id): bool
    {
        $user = $this->getById($id);
        if (!$user) {
            return false;
        }
        return $user->delete();
    }

}
