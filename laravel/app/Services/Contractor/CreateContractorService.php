<?php

namespace App\Services\Contractor;

use App\Repositories\Contractor\ContractorRepositoryInterface;
use Exception;

class CreateContractorService
{
    protected $repository;

    public function __construct(ContractorRepositoryInterface $repository)
    {
        $this->repository  = $repository;
    }

    public function createContractor($data) {
        $contractor = $this->repository->findContractor($data['document']);

        if ($contractor != null) {
            throw new Exception("Esse documento já esta sendo utilizado", 1);
        }

        $contractor = $this->repository->save($data);

        return $contractor;
    }
}
