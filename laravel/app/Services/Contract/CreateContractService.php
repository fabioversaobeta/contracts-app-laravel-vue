<?php

namespace App\Services\Contract;

use App\Repositories\ContractRepository;
use Exception;

class CreateContractService
{
    protected $repository;

    public function __construct()
    {
        $this->repository  = new ContractRepository();
    }

    public function createContract($data) {
        $contractor = $this->repository->save($data);

        return $contractor;
    }
}
