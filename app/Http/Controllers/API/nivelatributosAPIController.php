<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatenivelatributosAPIRequest;
use App\Http\Requests\API\UpdatenivelatributosAPIRequest;
use App\Models\nivelatributos;
use App\Repositories\nivelatributosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class nivelatributosController
 * @package App\Http\Controllers\API
 */

class nivelatributosAPIController extends AppBaseController
{
    /** @var  nivelatributosRepository */
    private $nivelatributosRepository;

    public function __construct(nivelatributosRepository $nivelatributosRepo)
    {
        $this->nivelatributosRepository = $nivelatributosRepo;
    }

    /**
     * Display a listing of the nivelatributos.
     * GET|HEAD /nivelatributos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $nivelatributos = $this->nivelatributosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($nivelatributos->toArray(), 'Nivelatributos retrieved successfully');
    }

    /**
     * Store a newly created nivelatributos in storage.
     * POST /nivelatributos
     *
     * @param CreatenivelatributosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatenivelatributosAPIRequest $request)
    {
        $input = $request->all();

        $nivelatributos = $this->nivelatributosRepository->create($input);

        return $this->sendResponse($nivelatributos->toArray(), 'Nivelatributos saved successfully');
    }

    /**
     * Display the specified nivelatributos.
     * GET|HEAD /nivelatributos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var nivelatributos $nivelatributos */
        $nivelatributos = $this->nivelatributosRepository->find($id);

        if (empty($nivelatributos)) {
            return $this->sendError('Nivelatributos not found');
        }

        return $this->sendResponse($nivelatributos->toArray(), 'Nivelatributos retrieved successfully');
    }

    /**
     * Update the specified nivelatributos in storage.
     * PUT/PATCH /nivelatributos/{id}
     *
     * @param int $id
     * @param UpdatenivelatributosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenivelatributosAPIRequest $request)
    {
        $input = $request->all();

        /** @var nivelatributos $nivelatributos */
        $nivelatributos = $this->nivelatributosRepository->find($id);

        if (empty($nivelatributos)) {
            return $this->sendError('Nivelatributos not found');
        }

        $nivelatributos = $this->nivelatributosRepository->update($input, $id);

        return $this->sendResponse($nivelatributos->toArray(), 'nivelatributos updated successfully');
    }

    /**
     * Remove the specified nivelatributos from storage.
     * DELETE /nivelatributos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var nivelatributos $nivelatributos */
        $nivelatributos = $this->nivelatributosRepository->find($id);

        if (empty($nivelatributos)) {
            return $this->sendError('Nivelatributos not found');
        }

        $nivelatributos->delete();

        return $this->sendResponse($id, 'Nivelatributos deleted successfully');
    }
}
