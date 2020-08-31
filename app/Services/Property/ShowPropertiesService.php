<?php

namespace App\Services\Property;

use App\Repositories\Property\PropertyRepositoryInterface;
use Exception;

class ShowPropertiesService
{
    protected $repository;

    public function __construct(PropertyRepositoryInterface $repository)
    {
        $this->repository  = $repository;
    }

    public function showProperties() {
        $properties = $this->repository->all();

        return $properties;
    }
}
