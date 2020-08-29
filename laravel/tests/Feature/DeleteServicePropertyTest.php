<?php

namespace Tests\Feature;

use App\Services\Property\CreatePropertyService;
use App\Services\Property\DeletePropertyService;
use App\Services\Property\ShowPropertiesService;
use App\Repositories\Property\FakePropertyRepository;

use Tests\TestCase;

class DeleteServicePropertyTest extends TestCase
{
    public function setUp() : void
    {
        parent::setUp();

        $repository = new FakePropertyRepository();
        $this->createPropertyService = new CreatePropertyService($repository);
        $this->deletePropertyService = new DeletePropertyService($repository);
        $this->showPropertiesService = new ShowPropertiesService($repository);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteProperty()
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

        $this->deletePropertyService->deleteProperty($property['id']);

        $properties = $this->showPropertiesService->showProperties();

        $this->assertCount(
            0,
            $properties, "testDeleteProperties doesn't contain 0 elements"
        );
    }
}
