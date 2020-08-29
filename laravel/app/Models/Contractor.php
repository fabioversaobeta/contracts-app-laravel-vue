<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;


class Contractor extends Model
{
    use UsesUuid;

    public $fillable = [
        'document',
        'email',
        'name'
    ];
}
