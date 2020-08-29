<?php

namespace Tests\Feature;

use App\Services\Property\CreatePropertyService;
use App\Repositories\Property\FakePropertyRepository;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateServicePropertyTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();

        $repository = new FakePropertyRepository();
        $this->createPropertyService = new CreatePropertyService($repository);
    }

    public function testCreateProperty()
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

        $property = $this->createPropertyService->createProperty($data);

        $this->assertArrayHasKey('id', $property);
    }

    public function testCreateExistProperty()
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

        $property = $this->createPropertyService->createProperty($data);

        $this->expectException("Exception");

        $property = $this->createPropertyService->createProperty($data);
    }
}
