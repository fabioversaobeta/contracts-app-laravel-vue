<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contract\ShowContractsService;
use App\Services\Contract\CreateContractService;

class ContractController extends Controller
{
    public function __construct(
        ShowContractsService $showContractsService,
        CreateContractService $createContractService
    )
    {
        $this->showContractsService = $showContractsService;
        $this->createContractService = $createContractService;
    }

    // SHOW
    public function show()
    {
        $dados = $this->showContractsService->showContracts();

        return response(json_encode($dados), 200);
    }

    // CREATE
    public function create(Request $request)
    {
        $request->validate([
            'contractor_id' => 'required'
        ]);

        $contract = $request->all();
        $dados = $this->createContractService->createContract($contract);

        return response(json_encode($dados), 201);
    }
}
