<?php

namespace App\Services\Property;

use App\Repositories\Property\PropertyRepositoryInterface;
use App\Models\Property;
use Exception;

class CreatePropertyService
{
    protected $repository;

    public function __construct(PropertyRepositoryInterface $repository)
    {
        $this->repository  = $repository;
    }

    public function createProperty($data) {
        $property = $this->repository->findProperty($data);

        if (sizeof($property) > 0) {
            throw new Exception("Esta propriedade já está cadastrada", 1);
        }

        $property = $this->repository->save($data);

        return $property;
    }
}
