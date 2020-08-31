<?php

namespace Tests\Feature;

use App\Services\Property\SetContractPropertyService;

use App\Repositories\Property\FakePropertyRepository;
use App\Repositories\Contract\FakeContractRepository;
use App\Repositories\Contractor\FakeContractorRepository;

use Tests\TestCase;

class SetContractServicePropertyTest extends TestCase
{
    protected $propertyRepository;
    protected $contractRepository;
    protected $contractorRepository;
    protected $setContractPropertyService;

    public function setUp() : void
    {
        parent::setUp();

        $this->propertyRepository = new FakePropertyRepository();
        $this->contractRepository = new FakeContractRepository();
        $this->contractorRepository = new FakeContractRepository();

        $this->setContractPropertyService = new SetContractPropertyService(
            $this->propertyRepository,
            $this->contractRepository
        );
    }

    public function testSeContractProperty()
    {
        // CONTRACTOR
        $dataContractor = (array) json_decode('{
            "document": "06693251986",
            "email": "fabio.versao.beta@gmail.com",
            "name": "Rua Joaquim Nabuco"
        }');

        $contractor = $this->contractorRepository->save($dataContractor);

        // CONTRACT
        $dataContract = (array) json_decode('{
            "contractor_id": "01ab39f8-0588-4161-a768-ee4ace310f9d"
        }');

        $contract = $this->contractRepository->save($dataContract);

        // PROPERTY
        $dataProperty = (array) json_decode('{
            "email": "fabio.versao.beta@gmail.com",
            "street": "Rua Joaquim Nabuco",
            "number": "697",
            "complement": "",
            "district": "Tingui",
            "city": "Curitiba",
            "state": "PR"
        }');

        $property = $this->propertyRepository->save($dataProperty);

        // TEST

        $dataTest = (array) json_decode('{
            "contract_id": "'.$contract["id"].'"
        }');

        $propertyUpdated = $this->setContractPropertyService->setContractProperty(
            $dataTest,
            $property['id']
        );

        $this->assertEquals(
            $dataTest['contract_id'],
            $propertyUpdated['contract_id']
        );
    }

    public function testSetContractNonExistProperty()
    {
        $dataTest = [
            "contract_id" => "non-exist-id"
        ];

        $this->expectException("Exception");

        $propertyUpdated = $this->setContractPropertyService->setContractProperty($dataTest,"any");
    }

    public function testSetContractNonExistContractProperty()
    {
        // PROPERTY
        $dataProperty = (array) json_decode('{
            "email": "fabio.versao.beta@gmail.com",
            "street": "Rua Joaquim Nabuco",
            "number": "697",
            "complement": "",
            "district": "Tingui",
            "city": "Curitiba",
            "state": "PR"
        }');

        $property = $this->propertyRepository->save($dataProperty);

        $dataTest = [
            "contract_id" => "non-exist-id"
        ];

        $this->expectException("Exception");

        $propertyUpdated = $this->setContractPropertyService->setContractProperty(
            $dataTest,
            $property['id']
        );
    }
}
