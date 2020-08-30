<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contractor;

class Contract extends Model
{
    use UsesUuid;

    public $fillable = [
        'contractor_id'
    ];

    public function contractor()
    {
        return $this->hasOne(Contractor::class, 'id', 'contractor_id');
    }
}
