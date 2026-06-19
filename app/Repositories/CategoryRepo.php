<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepo{

    public function __construct(
        private Category $category
    ) {
    }

    public function getPaginated(array $params = []){
        $query = $this->category->query()->with(['products']);

        if(!empty($params['search'])){
            $query = $query->where('name', 'ilike', '%' . $params['search'] . '%');
        }

        if(!empty($params['sort_by']) && in_array($params['sort_by'], ['id', 'name'])){
            $sortDir = !empty($params['sort_dir']) && in_array(strtolower($params['sort_dir']), ['asc', 'desc']) ? $params['sort_dir'] : 'asc';
            $query = $query->orderBy($params['sort_by'], $sortDir);
        }

        if(isset($params['is_active']) && $params['is_active']){
            $query = $query->where('is_active', $params['is_active']);
        }
 
        if(isset($params['paginated']) && !$params['paginated']){
            return $query->get();
        }

        return $query->paginate($params['per_page'] ?? 15);
    }

    public function getById(int $id): ?Category{
        return $this->category->find($id); 
    }

    public function create(array $data): Category{
        return $this->category->create($data);
    }

    public function update(int $id, array $data): ?Category{
        $category = $this->getById($id);

        if(!$category){
            return null;
        }

        $category->update($data);
        return $category;
    }

    public function toggleStatus(int $id): ?Category{
        $category = $this->getById($id);

        if(!$category){
            return null;
        }

        $category->is_active = !$category->is_active;
        $category->save();
        return $category;
    }

    public function delete(int $id): bool{
        $category = $this->getById($id);

        if(!$category){
            return false;
        }

        return $category->delete();
    }

}