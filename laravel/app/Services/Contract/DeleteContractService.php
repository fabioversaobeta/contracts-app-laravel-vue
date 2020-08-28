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

    public function deleteContract($id) {
        if (!$this->repository->delete($id)) {
            throw new Exception("Contrato indexistente", 1);
        }
    }
}
