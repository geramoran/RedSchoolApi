<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createtaller_has_escuelaAPIRequest;
use App\Http\Requests\API\Updatetaller_has_escuelaAPIRequest;
use App\Models\taller_has_escuela;
use App\Repositories\taller_has_escuelaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class taller_has_escuelaController
 * @package App\Http\Controllers\API
 */

class taller_has_escuelaAPIController extends AppBaseController
{
    /** @var  taller_has_escuelaRepository */
    private $tallerHasEscuelaRepository;

    public function __construct(taller_has_escuelaRepository $tallerHasEscuelaRepo)
    {
        $this->tallerHasEscuelaRepository = $tallerHasEscuelaRepo;
    }

    /**
     * Display a listing of the taller_has_escuela.
     * GET|HEAD /tallerHasEscuelas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tallerHasEscuelas = $this->tallerHasEscuelaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tallerHasEscuelas->toArray(), 'Taller Has Escuelas retrieved successfully');
    }

    /**
     * Store a newly created taller_has_escuela in storage.
     * POST /tallerHasEscuelas
     *
     * @param Createtaller_has_escuelaAPIRequest $request
     *
     * @return Response
     */
    public function store(Createtaller_has_escuelaAPIRequest $request)
    {
        $input = $request->all();

        $tallerHasEscuela = $this->tallerHasEscuelaRepository->create($input);

        return $this->sendResponse($tallerHasEscuela->toArray(), 'Taller Has Escuela saved successfully');
    }

    /**
     * Display the specified taller_has_escuela.
     * GET|HEAD /tallerHasEscuelas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var taller_has_escuela $tallerHasEscuela */
        $tallerHasEscuela = $this->tallerHasEscuelaRepository->find($id);

        if (empty($tallerHasEscuela)) {
            return $this->sendError('Taller Has Escuela not found');
        }

        return $this->sendResponse($tallerHasEscuela->toArray(), 'Taller Has Escuela retrieved successfully');
    }

    /**
     * Update the specified taller_has_escuela in storage.
     * PUT/PATCH /tallerHasEscuelas/{id}
     *
     * @param int $id
     * @param Updatetaller_has_escuelaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetaller_has_escuelaAPIRequest $request)
    {
        $input = $request->all();

        /** @var taller_has_escuela $tallerHasEscuela */
        $tallerHasEscuela = $this->tallerHasEscuelaRepository->find($id);

        if (empty($tallerHasEscuela)) {
            return $this->sendError('Taller Has Escuela not found');
        }

        $tallerHasEscuela = $this->tallerHasEscuelaRepository->update($input, $id);

        return $this->sendResponse($tallerHasEscuela->toArray(), 'taller_has_escuela updated successfully');
    }

    /**
     * Remove the specified taller_has_escuela from storage.
     * DELETE /tallerHasEscuelas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var taller_has_escuela $tallerHasEscuela */
        $tallerHasEscuela = $this->tallerHasEscuelaRepository->find($id);

        if (empty($tallerHasEscuela)) {
            return $this->sendError('Taller Has Escuela not found');
        }

        $tallerHasEscuela->delete();

        return $this->sendResponse($id, 'Taller Has Escuela deleted successfully');
    }
}
