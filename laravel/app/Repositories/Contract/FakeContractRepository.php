<?php
namespace App\Repositories\Contract;

use App\Repositories\Contract\ContractRepositoryInterface;
use Exception;

class FakeContractRepository implements ContractRepositoryInterface
{
    protected $contract;
    protected $contracts;

    public function __construct()
    {
        $this->contracts = [];
    }

    public function all()
    {
        return $this->contracts;
    }

    public function find($id)
    {
        $contract = null;

        foreach ($this->contracts as $key => $value) {
            if ($value['id'] == $id) {
                $contract = $value;
            }
        }

        return $contract;
    }

    public function save($data)
    {
        $data['id'] = 'new-id';

        if ($this->contracts[] = $data) {
            return $data;
        }

        throw new Exception('Error saving contract');
    }
}
