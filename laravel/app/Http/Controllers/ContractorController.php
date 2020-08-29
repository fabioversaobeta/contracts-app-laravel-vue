<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ShowContractorService;
use App\Services\Contractor\CreateContractorService;

class ContractorController extends Controller
{
    public function __construct(
        ShowContractorsService $showContractorsService,
        CreateContractorService $createContractorService
    )
    {
        $this->showContractorsService = $showContractorsService;
        $this->createContractorService = $createContractorService;
    }

    // SHOW
    public function show()
    {
        $dados = $showContractorsService->showContractors();

        return response(json_encode($dados), 200);
    }

    // CREATE
    public function create(Request $request)
    {
        $request->validate([
            'document' => 'required',
            'email' => 'required',
            'name' => 'required'
        ]);

        $contractor = $request->all();
        $dados = $this->createContractorService->createContractor($contractor);

        return response(json_encode($dados), 201);
    }

    // FIND
    // public function find(FindContractorRequest $request)
    // {
    //     $contractor = $request->input('contractor');
    //     $dados = $findContractorService->findContractor($contractor->document);

    //     return response(json_encode($dados), 200);
    // }
}
