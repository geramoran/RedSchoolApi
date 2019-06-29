<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecuotaAPIRequest;
use App\Http\Requests\API\UpdatecuotaAPIRequest;
use App\Models\cuota;
use App\Repositories\cuotaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class cuotaController
 * @package App\Http\Controllers\API
 */

class cuotaAPIController extends AppBaseController
{
    /** @var  cuotaRepository */
    private $cuotaRepository;

    public function __construct(cuotaRepository $cuotaRepo)
    {
        $this->cuotaRepository = $cuotaRepo;
    }

    /**
     * Display a listing of the cuota.
     * GET|HEAD /cuotas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cuotas = $this->cuotaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cuotas->toArray(), 'Cuotas retrieved successfully');
    }

    /**
     * Store a newly created cuota in storage.
     * POST /cuotas
     *
     * @param CreatecuotaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecuotaAPIRequest $request)
    {
        $input = $request->all();

        $cuota = $this->cuotaRepository->create($input);

        return $this->sendResponse($cuota->toArray(), 'Cuota saved successfully');
    }

    /**
     * Display the specified cuota.
     * GET|HEAD /cuotas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var cuota $cuota */
        $cuota = $this->cuotaRepository->find($id);

        if (empty($cuota)) {
            return $this->sendError('Cuota not found');
        }

        return $this->sendResponse($cuota->toArray(), 'Cuota retrieved successfully');
    }

    /**
     * Update the specified cuota in storage.
     * PUT/PATCH /cuotas/{id}
     *
     * @param int $id
     * @param UpdatecuotaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecuotaAPIRequest $request)
    {
        $input = $request->all();

        /** @var cuota $cuota */
        $cuota = $this->cuotaRepository->find($id);

        if (empty($cuota)) {
            return $this->sendError('Cuota not found');
        }

        $cuota = $this->cuotaRepository->update($input, $id);

        return $this->sendResponse($cuota->toArray(), 'cuota updated successfully');
    }

    /**
     * Remove the specified cuota from storage.
     * DELETE /cuotas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var cuota $cuota */
        $cuota = $this->cuotaRepository->find($id);

        if (empty($cuota)) {
            return $this->sendError('Cuota not found');
        }

        $cuota->delete();

        return $this->sendResponse($id, 'Cuota deleted successfully');
    }
}
