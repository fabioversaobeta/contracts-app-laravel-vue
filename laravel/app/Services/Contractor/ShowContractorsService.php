<?php

namespace App\Services\Contractor;

use App\Repositories\Contractor\ContractorRepositoryInterface;
use Exception;

class ShowContractorsService
{
    protected $repository;

    public function __construct(ContractorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function showContractors() {
        $contractors = $this->repository->all();

        return $contractors;
    }
}
