<?php

namespace App\Services\Contract;

use App\Repositories\Contract\ContractRepositoryInterface;
use Exception;

class ShowContractsService
{
    protected $repository;

    public function __construct(ContractRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function showContracts() {
        $contracts = $this->repository->all();

        return $contracts;
    }
}
