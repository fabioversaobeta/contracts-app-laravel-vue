<?php
namespace App\Repositories\Contractor;

use App\Repositories\Contractor\ContractorRepositoryInterface;
use Exception;

class FakeContractorRepository implements ContractorRepositoryInterface
{
    protected $contractor;
    protected $contractors;

    public function __construct()
    {
        $this->contractors = [];
    }

    public function all()
    {
        return $this->contractors;
    }

    public function find($id)
    {
        $contractor = null;

        foreach ($this->contractors as $key => $value) {
            if ($value['id'] == $id) {
                $contractor = $value;
            }
        }

        return $contractor;
    }

    public function findContractor($document) {
        $findContractors = [];

        foreach ($this->contractors as $key => $value) {
            if ($value['document'] == $document) {
                array_push($findContractors, $value);
            }
        }

        return $findContractors;
    }

    public function save($data)
    {
        $data['id'] = 'new-id';

        if ($this->contractors[] = $data) {
            return $data;
        }

        throw new Exception('Error saving contractor');
    }
}
