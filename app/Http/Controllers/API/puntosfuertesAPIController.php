<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepuntosfuertesAPIRequest;
use App\Http\Requests\API\UpdatepuntosfuertesAPIRequest;
use App\Models\puntosfuertes;
use App\Repositories\puntosfuertesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class puntosfuertesController
 * @package App\Http\Controllers\API
 */

class puntosfuertesAPIController extends AppBaseController
{
    /** @var  puntosfuertesRepository */
    private $puntosfuertesRepository;

    public function __construct(puntosfuertesRepository $puntosfuertesRepo)
    {
        $this->puntosfuertesRepository = $puntosfuertesRepo;
    }

    /**
     * Display a listing of the puntosfuertes.
     * GET|HEAD /puntosfuertes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $puntosfuertes = $this->puntosfuertesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($puntosfuertes->toArray(), 'Puntosfuertes retrieved successfully');
    }

    /**
     * Store a newly created puntosfuertes in storage.
     * POST /puntosfuertes
     *
     * @param CreatepuntosfuertesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatepuntosfuertesAPIRequest $request)
    {
        $input = $request->all();

        $puntosfuertes = $this->puntosfuertesRepository->create($input);

        return $this->sendResponse($puntosfuertes->toArray(), 'Puntosfuertes saved successfully');
    }

    /**
     * Display the specified puntosfuertes.
     * GET|HEAD /puntosfuertes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var puntosfuertes $puntosfuertes */
        $puntosfuertes = $this->puntosfuertesRepository->find($id);

        if (empty($puntosfuertes)) {
            return $this->sendError('Puntosfuertes not found');
        }

        return $this->sendResponse($puntosfuertes->toArray(), 'Puntosfuertes retrieved successfully');
    }

    /**
     * Update the specified puntosfuertes in storage.
     * PUT/PATCH /puntosfuertes/{id}
     *
     * @param int $id
     * @param UpdatepuntosfuertesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepuntosfuertesAPIRequest $request)
    {
        $input = $request->all();

        /** @var puntosfuertes $puntosfuertes */
        $puntosfuertes = $this->puntosfuertesRepository->find($id);

        if (empty($puntosfuertes)) {
            return $this->sendError('Puntosfuertes not found');
        }

        $puntosfuertes = $this->puntosfuertesRepository->update($input, $id);

        return $this->sendResponse($puntosfuertes->toArray(), 'puntosfuertes updated successfully');
    }

    /**
     * Remove the specified puntosfuertes from storage.
     * DELETE /puntosfuertes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var puntosfuertes $puntosfuertes */
        $puntosfuertes = $this->puntosfuertesRepository->find($id);

        if (empty($puntosfuertes)) {
            return $this->sendError('Puntosfuertes not found');
        }

        $puntosfuertes->delete();

        return $this->sendResponse($id, 'Puntosfuertes deleted successfully');
    }
}
