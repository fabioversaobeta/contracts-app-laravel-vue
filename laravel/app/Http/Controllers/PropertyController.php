<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Property\CreatePropertyService;
use App\Services\Property\ShowPropertiesService;

class PropertyController extends Controller
{
    public function __construct(
        CreatePropertyService $createPropertyService,
        ShowPropertiesService $showPropertiesService
    ) {
        $this->createPropertyService = $createPropertyService;
        $this->showPropertiesService = $showPropertiesService;
    }

    // SHOW
    public function show()
    {
        $dados = $this->showPropertiesService->showProperties();

        return response(json_encode($dados), 200);
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

        return response(json_encode($dados), 201);
    }

    // DELETE
    public function delete($id)
    {
        if (!$id) {
            return response("ID don't exist", 500);
        }

        $this->deletePropertyService->deleteProperty($id);

        return response('', 206);
    }
}
