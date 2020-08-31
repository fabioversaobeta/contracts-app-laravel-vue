<?php

namespace Tests\Feature;

use App\Services\Contract\CreateContractService;
use App\Services\Contract\ShowContractsService;
use App\Repositories\Contract\FakeContractRepository;

use Tests\TestCase;

class ShowServiceContractTest extends TestCase
{
    protected $repository;

    public function setUp() : void
    {
        parent::setUp();

        $this->repository = new FakeContractRepository();
        $this->createContractService = new CreateContractService(
            $this->repository
        );
        $this->showContractsService = new ShowContractsService(
            $this->repository
        );
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowContracts()
    {
        $data = (array) json_decode('{
            "document": "06693251986",
            "email": "fabio.versao.beta@gmail.com",
            "name": "Fabio Bandacheski"
        }');

        $this->repository->save($data);

        $data = (array) json_decode('{
            "document": "06693251986",
            "email": "fabio_versao_beta@hotmail.com",
            "name": "Fabio Bandacheski"
        }');

        $this->repository->save($data);

        $contracts = $this->showContractsService->showContracts();

        $this->assertCount(
            2,
            $contracts, "testShowContracts doesn't contain 1 element"
        );
    }
}
