<?php

namespace App\Services\Contract;

use App\Repositories\Contract\ContractRepositoryInterface;
use Exception;

class CreateContractService
{
    protected $repository;

    public function __construct(ContractRepositoryInterface $repository)
    {
        $this->repository  = $repository;
    }

    public function createContract($data) {
        $contract = $this->repository->save($data);

        return $contract;
    }
}
