<?php
namespace App\Repositories\Property;

use App\Repositories\Property\PropertyRepositoryInterface;

class FakePropertyRepository implements PropertyRepositoryInterface
{
    protected $property;
    protected $properties;

    public function __construct()
    {
        $this->properties = [];
    }

    public function findProperty($data) {
        $findProperties = [];

        foreach ($this->properties as $key => $value) {
            if (
                $value['street'] == $data['street'] &&
                $value['number'] == $data['number'] &&
                $value['complement'] == $data['complement'] &&
                $value['numcityber'] == $data['city'] &&
                $value['district'] == $data['district'] &&
                $value['state'] == $data['state']
            ) {
                array_push($findProperties, $value);
            }
        }

        return $findProperties;
    }

    public function save($data)
    {
        $data['contract_id'] = null;
        $data['id'] = 'novo-id';

        if ($this->properties[] = $data) {
            return $data;
        }

        throw new Exception('Error saving property');
    }
}
