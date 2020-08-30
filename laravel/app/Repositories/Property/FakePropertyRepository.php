<?php
namespace App\Repositories\Property;

use App\Repositories\Property\PropertyRepositoryInterface;
use Exception;

class FakePropertyRepository implements PropertyRepositoryInterface
{
    protected $property;
    protected $properties;

    public function __construct()
    {
        $this->properties = [];
    }

    public function all()
    {
        return $this->properties;
    }

    public function find($id)
    {
        // return array_get($this->properties, "id.$id");
        $property = null;

        foreach ($this->properties as $key => $value) {
            if ($value['id'] == $id) {
                $property = $value;
            }
        }

        return $property;
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

    public function update($model)
    {
        $search = $model['id'];

        foreach ($this->properties as $key => $value) {
            if ($value['id'] == $model['id']) {
                $propertyKey = $key;
                break;
            }
        }

        $this->properties[$propertyKey] = $model;

        return $model;
    }

    public function delete($property)
    {
        $propertyKey = array_search($property, $this->properties);

        if ($propertyKey == null && $propertyKey != 0) {
            throw new Exception("ID of property dont exist $propertyKey");
        }

        unset($this->properties[$propertyKey]);
    }
}
