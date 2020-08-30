<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Property\CreatePropertyService;
use App\Services\Property\ShowPropertiesService;
use App\Services\Property\DeletePropertyService;
use App\Services\Property\SetContractPropertyService;

class PropertyController extends Controller
{
    public function __construct(
        CreatePropertyService $createPropertyService,
        ShowPropertiesService $showPropertiesService,
        DeletePropertyService $deletePropertyService,
        SetContractPropertyService $setContractPropertyService
    ) {
        $this->createPropertyService = $createPropertyService;
        $this->showPropertiesService = $showPropertiesService;
        $this->deletePropertyService = $deletePropertyService;
        $this->setContractPropertyService = $setContractPropertyService;
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

        $property = $request->all();
        $dados = $this->createPropertyService->createProperty($property);

        return response(json_encode($dados), 201);
    }

    // DELETE
    public function delete(Request $request, $id)
    {
        if (!is_string($id)) {
            return response("ID don't exist", 500);
        }

        $this->deletePropertyService->deleteProperty($id);

        return response(json_encode([]), 204);
    }

    // SET CONTRACT
    public function setContract(Request $request, $id)
    {
        $request->validate([
            'contract_id' => 'required'
        ]);

        $contract = $request->all();
        $dados = $this->setContractPropertyService->setContractProperty(
            $contract, $id
        );

        return response(json_encode($dados), 200);
    }
}
