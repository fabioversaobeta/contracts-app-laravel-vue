<?php

namespace App\Services\Contractor;

use App\Repositories\ContractorRepository;
use Exception;

class ShowContractorsService
{
    protected $repository;

    public function __construct()
    {
        $this->repository  = new ContractorRepository();
    }

    public function showContractors() {
        $contractors = $this->repository->all();

        return $contractors;
    }
}
