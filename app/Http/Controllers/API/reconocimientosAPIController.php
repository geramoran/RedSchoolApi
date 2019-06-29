<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatereconocimientosAPIRequest;
use App\Http\Requests\API\UpdatereconocimientosAPIRequest;
use App\Models\reconocimientos;
use App\Repositories\reconocimientosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class reconocimientosController
 * @package App\Http\Controllers\API
 */

class reconocimientosAPIController extends AppBaseController
{
    /** @var  reconocimientosRepository */
    private $reconocimientosRepository;

    public function __construct(reconocimientosRepository $reconocimientosRepo)
    {
        $this->reconocimientosRepository = $reconocimientosRepo;
    }

    /**
     * Display a listing of the reconocimientos.
     * GET|HEAD /reconocimientos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $reconocimientos = $this->reconocimientosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($reconocimientos->toArray(), 'Reconocimientos retrieved successfully');
    }

    /**
     * Store a newly created reconocimientos in storage.
     * POST /reconocimientos
     *
     * @param CreatereconocimientosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatereconocimientosAPIRequest $request)
    {
        $input = $request->all();

        $reconocimientos = $this->reconocimientosRepository->create($input);

        return $this->sendResponse($reconocimientos->toArray(), 'Reconocimientos saved successfully');
    }

    /**
     * Display the specified reconocimientos.
     * GET|HEAD /reconocimientos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var reconocimientos $reconocimientos */
        $reconocimientos = $this->reconocimientosRepository->find($id);

        if (empty($reconocimientos)) {
            return $this->sendError('Reconocimientos not found');
        }

        return $this->sendResponse($reconocimientos->toArray(), 'Reconocimientos retrieved successfully');
    }

    /**
     * Update the specified reconocimientos in storage.
     * PUT/PATCH /reconocimientos/{id}
     *
     * @param int $id
     * @param UpdatereconocimientosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereconocimientosAPIRequest $request)
    {
        $input = $request->all();

        /** @var reconocimientos $reconocimientos */
        $reconocimientos = $this->reconocimientosRepository->find($id);

        if (empty($reconocimientos)) {
            return $this->sendError('Reconocimientos not found');
        }

        $reconocimientos = $this->reconocimientosRepository->update($input, $id);

        return $this->sendResponse($reconocimientos->toArray(), 'reconocimientos updated successfully');
    }

    /**
     * Remove the specified reconocimientos from storage.
     * DELETE /reconocimientos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var reconocimientos $reconocimientos */
        $reconocimientos = $this->reconocimientosRepository->find($id);

        if (empty($reconocimientos)) {
            return $this->sendError('Reconocimientos not found');
        }

        $reconocimientos->delete();

        return $this->sendResponse($id, 'Reconocimientos deleted successfully');
    }
}
