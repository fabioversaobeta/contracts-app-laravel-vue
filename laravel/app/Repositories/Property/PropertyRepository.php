<?php
namespace App\Repositories\Property;

use App\Repositories\Property\PropertyRepositoryInterface;
use App\Models\Property;

class PropertyRepository implements PropertyRepositoryInterface
{
    protected $property;

    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function findProperty($data) {
        $model = Property::where('street', '=', $data['street'])
            ->where('number', '=', $data['number'])
            ->where('complement', '=', $data['complement'])
            ->where('city', '=', $data['city'])
            ->where('district', '=', $data['district'])
            ->where('state', '=', $data['state'])
            ->get();

        return $model;
    }

    public function save($data)
    {
        $data['contract_id'] = null;

        $model = new Property();

        $model->fill($data);

        if ($model->save()) {
            return $model;
        }

        throw new Exception('Error saving property');
    }
}
