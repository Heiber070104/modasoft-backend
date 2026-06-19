<?php

namespace App\Repositories;

use App\Models\ThirdParty;
use App\Enums\ThirdPartyType;
use Illuminate\Validation\ValidationException;

class ThirdPartyRepo{

    public function __construct(
        private ThirdParty $thirdParty
    ) {
    }

    public function getPaginated(string $type, array $params = []){

        if($type && $type === ThirdPartyType::SUPPLIER->value){
            $query = $this->thirdParty->suppliers()->query();
        }else if($type && $type === ThirdPartyType::CUSTOMER->value){
            $query = $this->thirdParty->customers()->query();
        }else{
            throw ValidationException::withMessages([
                'message' => ['Type must be either supplier or customer.'],
            ]);
        }

        if(!empty($params['search'])){
            $searchTerm = $params['search'];
            $query = $query->where('name', 'ilike', '%' . $searchTerm . '%')
                ->orWhere('identification', 'ilike', '%' . $searchTerm . '%')
                ->orWhere('mobile', 'ilike', '%' . $searchTerm . '%')
                ->orWhere('address', 'ilike', '%' . $searchTerm . '%')
                ->orWhere('email', 'ilike', '%' . $searchTerm . '%');
        }

        if(!empty($params['sort_by']) && in_array($params['sort_by'], ['id', 'name', 'identification', 'mobile', 'address', 'email'])){
            $sortDir = !empty($params['sort_dir']) && in_array(strtolower($params['sort_dir']), ['asc', 'desc']) ? $params['sort_dir'] : 'asc';
            $query = $query->orderBy($params['sort_by'], $sortDir);
        }

        if(isset($params['is_active']) && is_bool($params['is_active'])){
            $query = $query->where('is_active', $params['is_active']);
        }

        if(isset($params['paginated']) && !$params['paginated']){
            return $query->get();
        }

        return $query->paginate($params['per_page'] ?? 15);
    }

    public function getById(string $type, int $id): ?ThirdParty{

        if($type && $type === ThirdPartyType::SUPPLIER->value){
            return $this->thirdParty->suppliers()->find($id);
        }else if($type && $type === ThirdPartyType::CUSTOMER->value){
            return $this->thirdParty->customers()->find($id);
        }else{
            throw ValidationException::withMessages([
                'message' => ['Type must be either supplier or customer.'],
            ]);
        }
    }

    public function create(string $type, array $data): ThirdParty{
        $data['type'] = $type;
        return $this->thirdParty->create($data);
    }

    public function update(string $type, int $id, array $data): ThirdParty{
        $thirdParty = $this->getById($type, $id);
        if (!$thirdParty) {
            throw ValidationException::withMessages([
                'message' => ['Third party not found.'],
            ]);
        }
        if(isset($data['type'])){
            unset($data['type']);
        }
        $thirdParty->update($data);
        return $thirdParty;
    }

    public function delete(string $type, int $id): bool{

        $thirdParty = $this->getById($type, $id);
        if (!$thirdParty) {
            throw ValidationException::withMessages([
                'message' => ['Third party not found.'],
            ]);
        }
        return $thirdParty->delete();
    }

}  