<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatenivelAPIRequest;
use App\Http\Requests\API\UpdatenivelAPIRequest;
use App\Models\nivel;
use App\Repositories\nivelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class nivelController
 * @package App\Http\Controllers\API
 */

class nivelAPIController extends AppBaseController
{
    /** @var  nivelRepository */
    private $nivelRepository;

    public function __construct(nivelRepository $nivelRepo)
    {
        $this->nivelRepository = $nivelRepo;
    }

    /**
     * Display a listing of the nivel.
     * GET|HEAD /nivels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $nivels = $this->nivelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($nivels->toArray(), 'Nivels retrieved successfully');
    }

    /**
     * Store a newly created nivel in storage.
     * POST /nivels
     *
     * @param CreatenivelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatenivelAPIRequest $request)
    {
        $input = $request->all();

        $nivel = $this->nivelRepository->create($input);

        return $this->sendResponse($nivel->toArray(), 'Nivel saved successfully');
    }

    /**
     * Display the specified nivel.
     * GET|HEAD /nivels/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var nivel $nivel */
        $nivel = $this->nivelRepository->find($id);

        if (empty($nivel)) {
            return $this->sendError('Nivel not found');
        }

        return $this->sendResponse($nivel->toArray(), 'Nivel retrieved successfully');
    }

    /**
     * Update the specified nivel in storage.
     * PUT/PATCH /nivels/{id}
     *
     * @param int $id
     * @param UpdatenivelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenivelAPIRequest $request)
    {
        $input = $request->all();

        /** @var nivel $nivel */
        $nivel = $this->nivelRepository->find($id);

        if (empty($nivel)) {
            return $this->sendError('Nivel not found');
        }

        $nivel = $this->nivelRepository->update($input, $id);

        return $this->sendResponse($nivel->toArray(), 'nivel updated successfully');
    }

    /**
     * Remove the specified nivel from storage.
     * DELETE /nivels/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var nivel $nivel */
        $nivel = $this->nivelRepository->find($id);

        if (empty($nivel)) {
            return $this->sendError('Nivel not found');
        }

        $nivel->delete();

        return $this->sendResponse($id, 'Nivel deleted successfully');
    }
}
