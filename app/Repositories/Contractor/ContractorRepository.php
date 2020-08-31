<?php
namespace App\Repositories\Contractor;

use App\Repositories\Contractor\ContractorRepositoryInterface;
use App\Models\Contractor;

class ContractorRepository implements ContractorRepositoryInterface
{
    protected $contractor;

    public function __construct(Contractor $contractor)
    {
        $this->contractor = $contractor;
    }

    public function all()
    {
        return $this->contractor::all();
    }

    public function find($id)
    {
        return $model = $this->contractor::find($id);
    }

    public function findContractor($document)
    {
        $model = Contractor::where('document', '=', $document)->first();

        return $model;
    }

    public function save($data)
    {
        $model = new Contractor();

        $model->fill($data);

        if ($model->save()) {
            return $model;
        }

        throw new Exception('Error saving contractor');
    }
}
