<?php
namespace App\Repositories\Contract;

use App\Repositories\Contract\ContractRepositoryInterface;
use App\Models\Contract;

class ContractRepository implements ContractRepositoryInterface
{
    protected $contract;

    public function __construct(Contract $contract)
    {
        $this->contract = $contract;
    }

    public function all()
    {
        return $this->contract::all();
    }

    public function find($id)
    {
        return $model = $this->contract::find($id);
    }

    public function save($data)
    {
        $model = new Contract();

        $model->fill($data);

        if ($model->save()) {
            return $model;
        }

        throw new Exception('Error saving contract');
    }
}
