<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use UsesUuid;

    public $fillable = [
        'contractor_id'
    ];

    // relacionamento com Contractor
}
