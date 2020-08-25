<?php
namespace App;

use App\Repositories\BaseRepository;

class PropertyRepository extends BaseRepository
{
    protected $property;

    public function __construct(Property $property)
    {
        parent::__construct($property);
    }

    public function findProperty($data) {
        $model = $this
            ->where('street', '=', $data->street)
            ->where('number', '=', $data->number)
            ->where('complement', '=', $data->complement)
            ->where('city', '=', $data->city)
            ->where('district', '=', $data->district)
            ->get();

        return $model;
    }
}
