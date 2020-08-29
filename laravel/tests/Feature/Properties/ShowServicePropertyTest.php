<?php

namespace Tests\Feature;

use App\Services\Property\CreatePropertyService;
use App\Services\Property\ShowPropertiesService;
use App\Repositories\Property\FakePropertyRepository;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowServicePropertyTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();

        $repository = new FakePropertyRepository();
        $this->createPropertyService = new CreatePropertyService($repository);
        $this->showPropertiesService = new ShowPropertiesService($repository);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testShowProperties()
    {
        $data = (array) json_decode('{
            "email": "fabio.versao.beta@gmail.com",
            "street": "Rua Joaquim Nabuco",
            "number": "697",
            "complement": "",
            "district": "Tingui",
            "city": "Curitiba",
            "state": "PR"
        }');

        $this->createPropertyService->createProperty($data);

        $data = (array) json_decode('{
            "email": "fabio_versao_beta@hotmail.com",
            "street": "Rua Campo Mourão",
            "number": "1352",
            "complement": "",
            "district": "Guaraituba",
            "city": "Colombo",
            "state": "PR"
        }');

        $this->createPropertyService->createProperty($data);

        $properties = $this->showPropertiesService->showProperties();

        $this->assertCount(
            2,
            $properties, "testShowProperties doesn't contain 1 element"
        );
    }
}
