<?php
namespace App;

use App\Repositories\BaseRepository;

class ContractorRepository extends BaseRepository
{
    protected $contractor;

    public function __construct(Contractor $contractor)
    {
        parent::__construct($contractor);
    }

    public function delete($id) {
        $model = $this->find($id);

        if ($model) {
            return $model->delete();
        }

        return false;
    }
}
