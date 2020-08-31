<?php
namespace App\Repositories\Contractor;

interface ContractorRepositoryInterface
{
    public function all();

    public function find($id);

    public function findContractor($document);

    public function save($data);
};
