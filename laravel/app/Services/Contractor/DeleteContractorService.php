<?php

namespace App\Services\Contractor;

use App\Repositories\ContractorRepository;
use Exception;

class CreateContractorService
{
    protected $repository;

    public function __construct()
    {
        $this->repository  = new ContractorRepository();
    }

    public function deleteContractor($id) {
        if (!$this->repository->delete($id)) {
            throw new Exception("Contratando indexistente", 1);
        }
    }
}
