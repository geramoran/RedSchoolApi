<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createescuela_has_nivelAPIRequest;
use App\Http\Requests\API\Updateescuela_has_nivelAPIRequest;
use App\Models\escuela_has_nivel;
use App\Repositories\escuela_has_nivelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class escuela_has_nivelController
 * @package App\Http\Controllers\API
 */

class escuela_has_nivelAPIController extends AppBaseController
{
    /** @var  escuela_has_nivelRepository */
    private $escuelaHasNivelRepository;

    public function __construct(escuela_has_nivelRepository $escuelaHasNivelRepo)
    {
        $this->escuelaHasNivelRepository = $escuelaHasNivelRepo;
    }

    /**
     * Display a listing of the escuela_has_nivel.
     * GET|HEAD /escuelaHasNivels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $escuelaHasNivels = $this->escuelaHasNivelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($escuelaHasNivels->toArray(), 'Escuela Has Nivels retrieved successfully');
    }

    /**
     * Store a newly created escuela_has_nivel in storage.
     * POST /escuelaHasNivels
     *
     * @param Createescuela_has_nivelAPIRequest $request
     *
     * @return Response
     */
    public function store(Createescuela_has_nivelAPIRequest $request)
    {
        $input = $request->all();

        $escuelaHasNivel = $this->escuelaHasNivelRepository->create($input);

        return $this->sendResponse($escuelaHasNivel->toArray(), 'Escuela Has Nivel saved successfully');
    }

    /**
     * Display the specified escuela_has_nivel.
     * GET|HEAD /escuelaHasNivels/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var escuela_has_nivel $escuelaHasNivel */
        $escuelaHasNivel = $this->escuelaHasNivelRepository->find($id);

        if (empty($escuelaHasNivel)) {
            return $this->sendError('Escuela Has Nivel not found');
        }

        return $this->sendResponse($escuelaHasNivel->toArray(), 'Escuela Has Nivel retrieved successfully');
    }

    /**
     * Update the specified escuela_has_nivel in storage.
     * PUT/PATCH /escuelaHasNivels/{id}
     *
     * @param int $id
     * @param Updateescuela_has_nivelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateescuela_has_nivelAPIRequest $request)
    {
        $input = $request->all();

        /** @var escuela_has_nivel $escuelaHasNivel */
        $escuelaHasNivel = $this->escuelaHasNivelRepository->find($id);

        if (empty($escuelaHasNivel)) {
            return $this->sendError('Escuela Has Nivel not found');
        }

        $escuelaHasNivel = $this->escuelaHasNivelRepository->update($input, $id);

        return $this->sendResponse($escuelaHasNivel->toArray(), 'escuela_has_nivel updated successfully');
    }

    /**
     * Remove the specified escuela_has_nivel from storage.
     * DELETE /escuelaHasNivels/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var escuela_has_nivel $escuelaHasNivel */
        $escuelaHasNivel = $this->escuelaHasNivelRepository->find($id);

        if (empty($escuelaHasNivel)) {
            return $this->sendError('Escuela Has Nivel not found');
        }

        $escuelaHasNivel->delete();

        return $this->sendResponse($id, 'Escuela Has Nivel deleted successfully');
    }
}
