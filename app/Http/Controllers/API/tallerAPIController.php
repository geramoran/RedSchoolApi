<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetallerAPIRequest;
use App\Http\Requests\API\UpdatetallerAPIRequest;
use App\Models\taller;
use App\Repositories\tallerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tallerController
 * @package App\Http\Controllers\API
 */

class tallerAPIController extends AppBaseController
{
    /** @var  tallerRepository */
    private $tallerRepository;

    public function __construct(tallerRepository $tallerRepo)
    {
        $this->tallerRepository = $tallerRepo;
    }

    /**
     * Display a listing of the taller.
     * GET|HEAD /tallers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tallers = $this->tallerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tallers->toArray(), 'Tallers retrieved successfully');
    }

    /**
     * Store a newly created taller in storage.
     * POST /tallers
     *
     * @param CreatetallerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetallerAPIRequest $request)
    {
        $input = $request->all();

        $taller = $this->tallerRepository->create($input);

        return $this->sendResponse($taller->toArray(), 'Taller saved successfully');
    }

    /**
     * Display the specified taller.
     * GET|HEAD /tallers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var taller $taller */
        $taller = $this->tallerRepository->find($id);

        if (empty($taller)) {
            return $this->sendError('Taller not found');
        }

        return $this->sendResponse($taller->toArray(), 'Taller retrieved successfully');
    }

    /**
     * Update the specified taller in storage.
     * PUT/PATCH /tallers/{id}
     *
     * @param int $id
     * @param UpdatetallerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetallerAPIRequest $request)
    {
        $input = $request->all();

        /** @var taller $taller */
        $taller = $this->tallerRepository->find($id);

        if (empty($taller)) {
            return $this->sendError('Taller not found');
        }

        $taller = $this->tallerRepository->update($input, $id);

        return $this->sendResponse($taller->toArray(), 'taller updated successfully');
    }

    /**
     * Remove the specified taller from storage.
     * DELETE /tallers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var taller $taller */
        $taller = $this->tallerRepository->find($id);

        if (empty($taller)) {
            return $this->sendError('Taller not found');
        }

        $taller->delete();

        return $this->sendResponse($id, 'Taller deleted successfully');
    }
}
