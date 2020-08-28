<?php
namespace App\Repositories\Property;

interface PropertyRepositoryInterface
{
    public function findProperty($data);

    public function save($data);
};
