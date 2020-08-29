<?php
namespace App\Repositories\Property;

interface PropertyRepositoryInterface
{
    public function all();

    public function findProperty($data);

    public function save($data);
};
