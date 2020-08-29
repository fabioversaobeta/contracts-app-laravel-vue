<?php
namespace App\Repositories\Property;

use App\Models\Property;

interface PropertyRepositoryInterface
{
    public function all();

    public function find($id);

    public function findProperty($data);

    public function save($data);

    public function delete(Property $property);
};
