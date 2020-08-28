<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Property\CreatePropertyService;

class PropertyController extends Controller
{
    public function __construct(CreatePropertyService $createPropertyService)
    {
        $this->createPropertyService = $createPropertyService;
    }
    // CREATE
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'street' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);

        $contractor = $request->all();
        $dados = $this->createPropertyService->createProperty($contractor);

        // return response()->json($contractor, 200);

        return response(json_encode($dados), 201);
    }
}
