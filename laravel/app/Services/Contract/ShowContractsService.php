<?php

namespace App\Services\Contract;

use App\Repositories\ContractRepository;
use Exception;

class ShowContractsService
{
    protected $repository;

    public function __construct()
    {
        $this->repository  = new ContractRepository();
    }

    public function showContracts() {
        $contracts = $this->repository->all();

        return $contracts;
    }
}
