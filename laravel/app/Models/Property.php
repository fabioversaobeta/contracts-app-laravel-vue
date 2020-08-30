<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Contract;

class Property extends Model
{
    use SoftDeletes;
    use UsesUuid;

    public $fillable = [
        'email',
        'street',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'contract_id'
    ];

    protected $dates = ['deleted_at'];

    public function contract()
    {
        return $this->hasOne(Contract::class, 'id', 'contract_id');
    }
}
