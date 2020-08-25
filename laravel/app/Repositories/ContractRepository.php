<?php
namespace App;

use App\Repositories\BaseRepository;

class ContractRepository extends BaseRepository
{
    protected $contract;

    public function __construct(Contract $contract)
    {
        parent::__construct($contract);
    }
}
