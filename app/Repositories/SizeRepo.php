<?php

namespace App\Repositories;

use App\Models\Size;

class SizeRepo{

    public function __construct(
        private Size $size
    ) {
    }

    public function getPaginated(array $params = []){
        $query = $this->size->query()->with(['category', 'products']);

        if(!empty($params['search'])){
            $query = $query->where('name', 'ilike', '%' . $params['search'] . '%');
        }

        if(!empty($params['sort_by']) && in_array($params['sort_by'], ['id', 'name'])){
            $sortDir = !empty($params['sort_dir']) && in_array(strtolower($params['sort_dir']), ['asc', 'desc']) ? $params['sort_dir'] : 'asc';
            $query = $query->orderBy($params['sort_by'], $sortDir);
        }
        
        return $query->paginate($params['per_page'] ?? 15);
    }

    public function getById(int $id): ?Size{
        return $this->size->find($id);
    }

    public function create(array $data): Size{
        return $this->size->create($data);
    }

    public function update(int $id, array $data): ?Size{
        $size = $this->getById($id);

        if(!$size){
            return null;
        }

        $size->update($data);
        return $size;
    }

    public function delete(int $id): bool{
        $size = $this->getById($id);

        if(!$size){
            return false;
        }

        $size->delete();
        return true;
    }
}