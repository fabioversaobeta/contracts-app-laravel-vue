<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractorRequest;
use App\Http\Requests\DeleteContractorRequest;

use App\Services\ShowContractorService;
use App\Services\CreateContractorService;
use App\Services\DeleteContractorService;

class ContractorController extends Controller
{
    public function __construct(
        ShowContractorsService $showContractorsService,
        CreateContractorService $createContractorService,
        FindContractorService $findContractorService,
        DeleteContractorService $deleteContractorService
    )
    {
        $this->showContractorsService = $showContractorsService;
        $this->createContractorService = $createContractorService;
        $this->findContractorService = $findContractorService;
        $this->deleteContractorService = $deleteContractorService;
    }

    // SHOW
    public function show()
    {
        $dados = $showContractorsService->showContractors();

        return response(json_encode($dados), 200);
    }

    // CREATE
    public function create(CreateContractorRequest $request)
    {
        $contractor = $request->input('contractor');
        $dados = $createContractorService->createContractor($contractor);

        return response(json_encode($dados), 200);
    }

    // FIND
    public function find(FindContractorRequest $request)
    {
        $contractor = $request->input('contractor');
        $dados = $findContractorService->findContractor($contractor->document);

        return response(json_encode($dados), 200);
    }

    // DELETE
    public function delete(DeleteContractorRequest $request)
    {
        $id = $request->input('id');

        $deleteContractorService->delete($id);

        return response(206);
    }
}
