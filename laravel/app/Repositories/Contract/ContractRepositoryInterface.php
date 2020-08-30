<?php
namespace App\Repositories\Contract;

interface ContractRepositoryInterface
{
    public function all();

    public function find($id);

    public function save($data);
};
