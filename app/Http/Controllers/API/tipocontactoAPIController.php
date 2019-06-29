<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetipocontactoAPIRequest;
use App\Http\Requests\API\UpdatetipocontactoAPIRequest;
use App\Models\tipocontacto;
use App\Repositories\tipocontactoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class tipocontactoController
 * @package App\Http\Controllers\API
 */

class tipocontactoAPIController extends AppBaseController
{
    /** @var  tipocontactoRepository */
    private $tipocontactoRepository;

    public function __construct(tipocontactoRepository $tipocontactoRepo)
    {
        $this->tipocontactoRepository = $tipocontactoRepo;
    }

    /**
     * Display a listing of the tipocontacto.
     * GET|HEAD /tipocontactos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipocontactos = $this->tipocontactoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipocontactos->toArray(), 'Tipocontactos retrieved successfully');
    }

    /**
     * Store a newly created tipocontacto in storage.
     * POST /tipocontactos
     *
     * @param CreatetipocontactoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetipocontactoAPIRequest $request)
    {
        $input = $request->all();

        $tipocontacto = $this->tipocontactoRepository->create($input);

        return $this->sendResponse($tipocontacto->toArray(), 'Tipocontacto saved successfully');
    }

    /**
     * Display the specified tipocontacto.
     * GET|HEAD /tipocontactos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tipocontacto $tipocontacto */
        $tipocontacto = $this->tipocontactoRepository->find($id);

        if (empty($tipocontacto)) {
            return $this->sendError('Tipocontacto not found');
        }

        return $this->sendResponse($tipocontacto->toArray(), 'Tipocontacto retrieved successfully');
    }

    /**
     * Update the specified tipocontacto in storage.
     * PUT/PATCH /tipocontactos/{id}
     *
     * @param int $id
     * @param UpdatetipocontactoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipocontactoAPIRequest $request)
    {
        $input = $request->all();

        /** @var tipocontacto $tipocontacto */
        $tipocontacto = $this->tipocontactoRepository->find($id);

        if (empty($tipocontacto)) {
            return $this->sendError('Tipocontacto not found');
        }

        $tipocontacto = $this->tipocontactoRepository->update($input, $id);

        return $this->sendResponse($tipocontacto->toArray(), 'tipocontacto updated successfully');
    }

    /**
     * Remove the specified tipocontacto from storage.
     * DELETE /tipocontactos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tipocontacto $tipocontacto */
        $tipocontacto = $this->tipocontactoRepository->find($id);

        if (empty($tipocontacto)) {
            return $this->sendError('Tipocontacto not found');
        }

        $tipocontacto->delete();

        return $this->sendResponse($id, 'Tipocontacto deleted successfully');
    }
}
