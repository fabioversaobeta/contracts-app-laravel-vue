<?php

namespace App\Services\Property;

use App\Repositories\Property\PropertyRepositoryInterface;
use App\Models\Property;
use Exception;

class DeletePropertyService
{
    protected $repository;

    public function __construct(PropertyRepositoryInterface $repository)
    {
        $this->repository  = $repository;
    }

    public function deleteProperty($id) {
        $property = $this->repository->find($id);

        if (sizeof($property) == 0) {
            throw new Exception("ID de propriedade não encontrado", 1);
        }

        $this->repository->delete($property);
    }
}
