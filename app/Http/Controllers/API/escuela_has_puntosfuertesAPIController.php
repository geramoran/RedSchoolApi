<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createescuela_has_puntosfuertesAPIRequest;
use App\Http\Requests\API\Updateescuela_has_puntosfuertesAPIRequest;
use App\Models\escuela_has_puntosfuertes;
use App\Repositories\escuela_has_puntosfuertesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class escuela_has_puntosfuertesController
 * @package App\Http\Controllers\API
 */

class escuela_has_puntosfuertesAPIController extends AppBaseController
{
    /** @var  escuela_has_puntosfuertesRepository */
    private $escuelaHasPuntosfuertesRepository;

    public function __construct(escuela_has_puntosfuertesRepository $escuelaHasPuntosfuertesRepo)
    {
        $this->escuelaHasPuntosfuertesRepository = $escuelaHasPuntosfuertesRepo;
    }

    /**
     * Display a listing of the escuela_has_puntosfuertes.
     * GET|HEAD /escuelaHasPuntosfuertes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($escuelaHasPuntosfuertes->toArray(), 'Escuela Has Puntosfuertes retrieved successfully');
    }

    /**
     * Store a newly created escuela_has_puntosfuertes in storage.
     * POST /escuelaHasPuntosfuertes
     *
     * @param Createescuela_has_puntosfuertesAPIRequest $request
     *
     * @return Response
     */
    public function store(Createescuela_has_puntosfuertesAPIRequest $request)
    {
        $input = $request->all();

        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->create($input);

        return $this->sendResponse($escuelaHasPuntosfuertes->toArray(), 'Escuela Has Puntosfuertes saved successfully');
    }

    /**
     * Display the specified escuela_has_puntosfuertes.
     * GET|HEAD /escuelaHasPuntosfuertes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var escuela_has_puntosfuertes $escuelaHasPuntosfuertes */
        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->find($id);

        if (empty($escuelaHasPuntosfuertes)) {
            return $this->sendError('Escuela Has Puntosfuertes not found');
        }

        return $this->sendResponse($escuelaHasPuntosfuertes->toArray(), 'Escuela Has Puntosfuertes retrieved successfully');
    }

    /**
     * Update the specified escuela_has_puntosfuertes in storage.
     * PUT/PATCH /escuelaHasPuntosfuertes/{id}
     *
     * @param int $id
     * @param Updateescuela_has_puntosfuertesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateescuela_has_puntosfuertesAPIRequest $request)
    {
        $input = $request->all();

        /** @var escuela_has_puntosfuertes $escuelaHasPuntosfuertes */
        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->find($id);

        if (empty($escuelaHasPuntosfuertes)) {
            return $this->sendError('Escuela Has Puntosfuertes not found');
        }

        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->update($input, $id);

        return $this->sendResponse($escuelaHasPuntosfuertes->toArray(), 'escuela_has_puntosfuertes updated successfully');
    }

    /**
     * Remove the specified escuela_has_puntosfuertes from storage.
     * DELETE /escuelaHasPuntosfuertes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var escuela_has_puntosfuertes $escuelaHasPuntosfuertes */
        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->find($id);

        if (empty($escuelaHasPuntosfuertes)) {
            return $this->sendError('Escuela Has Puntosfuertes not found');
        }

        $escuelaHasPuntosfuertes->delete();

        return $this->sendResponse($id, 'Escuela Has Puntosfuertes deleted successfully');
    }
}
