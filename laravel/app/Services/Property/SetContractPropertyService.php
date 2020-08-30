<?php

namespace App\Services\Property;

use App\Repositories\Property\PropertyRepositoryInterface;
use App\Repositories\Contract\ContractRepositoryInterface;
use Exception;

class SetContractPropertyService
{
    protected $propertyRepository;
    protected $contractRepository;

    public function __construct(
        PropertyRepositoryInterface $propertyRepository,
        ContractRepositoryInterface $contractRepository
    )
    {
        $this->propertyRepository  = $propertyRepository;
        $this->contractRepository  = $contractRepository;
    }

    public function setContractProperty($contractData, $id) {
        $property = $this->propertyRepository->find($id);

        if ($property == null) {
            throw new Exception("Esta propriedade não existe", 1);
        }

        $contract = $this->contractRepository->find(
            $contractData['contract_id']
        );

        if ($contract == null) {
            throw new Exception("Este Contrato não existe", 1);
        }

        $property['contract_id'] = $contractData['contract_id'];

        $propertyUpdated = $this->propertyRepository->update($property);

        return $propertyUpdated;
    }
}
