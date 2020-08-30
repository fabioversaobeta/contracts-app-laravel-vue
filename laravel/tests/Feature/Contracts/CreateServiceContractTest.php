<?php

namespace Tests\Feature;

use App\Services\Contract\CreateContractService;
use App\Repositories\Contract\FakeContractRepository;

use Tests\TestCase;

class CreateServiceContractTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();

        $contract = new FakeContractRepository();
        $this->createContractService = new CreateContractService(
            $contract
        );
    }

    public function testCreateContract()
    {
        $data = (array) json_decode('{
            "contractor_id": "01ab39f8-0588-4161-a768-ee4ace310f9d"
        }');

        $contract = $this->createContractService->createContract($data);

        $this->assertArrayHasKey('id', $contract);
    }
}
