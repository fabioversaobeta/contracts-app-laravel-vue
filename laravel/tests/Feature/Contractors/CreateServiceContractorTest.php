<?php

namespace Tests\Feature;

use App\Services\Contractor\CreateContractorService;
use App\Repositories\Contractor\FakeContractorRepository;

use Tests\TestCase;

class CreateServiceContractorTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();

        $contractor = new FakeContractorRepository();
        $this->createContractorService = new CreateContractorService(
            $contractor
        );
    }

    public function testCreateContractor()
    {
        $data = (array) json_decode('{
            "document": "06693251986",
            "email": "fabio.versao.beta@gmail.com",
            "name": "Rua Joaquim Nabuco"
        }');

        $contractor = $this->createContractorService->createContractor($data);

        $this->assertArrayHasKey('id', $contractor);
    }

    public function testCreateExistContractor()
    {
        $data = (array) json_decode('{
            "document": "06693251986",
            "email": "fabio.versao.beta@gmail.com",
            "name": "Rua Joaquim Nabuco"
        }');

        $contractor = $this->createContractorService->createContractor($data);

        $this->expectException("Exception");

        $contractor = $this->createContractorService->createContractor($data);
    }
}
