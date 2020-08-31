<?php

namespace Tests\Feature;

use App\Services\Contractor\CreateContractorService;
use App\Services\Contractor\ShowContractorsService;
use App\Repositories\Contractor\FakeContractorRepository;

use Tests\TestCase;

class ShowServiceContractorTest extends TestCase
{
    protected $repository;

    public function setUp() : void
    {
        parent::setUp();

        $this->repository = new FakeContractorRepository();
        $this->createContractorService = new CreateContractorService(
            $this->repository
        );
        $this->showContractorsService = new ShowContractorsService(
            $this->repository
        );
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowContractors()
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

        $contractors = $this->showContractorsService->showContractors();

        $this->assertCount(
            2,
            $contractors, "testShowContractors doesn't contain 1 element"
        );
    }
}
