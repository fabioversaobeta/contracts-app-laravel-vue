<?php

namespace App\Services\Contractor;

use App\Repositories\ContractorRepository;
use Exception;

class FindContractorService
{
    protected $repository;

    public function __construct()
    {
        $this->repository  = new ContractorRepository();
    }

    public function findContractor($document) {
        $contractor = $this->repository->findByColumn('document', $document);

        if (!$contractor) {
            throw new Exception("Contratante inexistente", 1);
        }

        return $contractor;
    }
}
