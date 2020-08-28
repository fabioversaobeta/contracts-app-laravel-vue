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

    public function createContractor($data) {
        $contractor = $this->repository->findByColumn(
            'document',
            $data->document
        );

        if ($contractor) {
            throw new Exception(
                "Já existe um contratante utilizando este número de documento"
                , 1
            );
        }

        $contractor = $this->repository->save($data);

        return $contractor;
    }
}
