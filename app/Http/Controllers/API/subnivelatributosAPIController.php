<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesubnivelatributosAPIRequest;
use App\Http\Requests\API\UpdatesubnivelatributosAPIRequest;
use App\Models\subnivelatributos;
use App\Repositories\subnivelatributosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class subnivelatributosController
 * @package App\Http\Controllers\API
 */

class subnivelatributosAPIController extends AppBaseController
{
    /** @var  subnivelatributosRepository */
    private $subnivelatributosRepository;

    public function __construct(subnivelatributosRepository $subnivelatributosRepo)
    {
        $this->subnivelatributosRepository = $subnivelatributosRepo;
    }

    /**
     * Display a listing of the subnivelatributos.
     * GET|HEAD /subnivelatributos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subnivelatributos = $this->subnivelatributosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subnivelatributos->toArray(), 'Subnivelatributos retrieved successfully');
    }

    /**
     * Store a newly created subnivelatributos in storage.
     * POST /subnivelatributos
     *
     * @param CreatesubnivelatributosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesubnivelatributosAPIRequest $request)
    {
        $input = $request->all();

        $subnivelatributos = $this->subnivelatributosRepository->create($input);

        return $this->sendResponse($subnivelatributos->toArray(), 'Subnivelatributos saved successfully');
    }

    /**
     * Display the specified subnivelatributos.
     * GET|HEAD /subnivelatributos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var subnivelatributos $subnivelatributos */
        $subnivelatributos = $this->subnivelatributosRepository->find($id);

        if (empty($subnivelatributos)) {
            return $this->sendError('Subnivelatributos not found');
        }

        return $this->sendResponse($subnivelatributos->toArray(), 'Subnivelatributos retrieved successfully');
    }

    /**
     * Update the specified subnivelatributos in storage.
     * PUT/PATCH /subnivelatributos/{id}
     *
     * @param int $id
     * @param UpdatesubnivelatributosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubnivelatributosAPIRequest $request)
    {
        $input = $request->all();

        /** @var subnivelatributos $subnivelatributos */
        $subnivelatributos = $this->subnivelatributosRepository->find($id);

        if (empty($subnivelatributos)) {
            return $this->sendError('Subnivelatributos not found');
        }

        $subnivelatributos = $this->subnivelatributosRepository->update($input, $id);

        return $this->sendResponse($subnivelatributos->toArray(), 'subnivelatributos updated successfully');
    }

    /**
     * Remove the specified subnivelatributos from storage.
     * DELETE /subnivelatributos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var subnivelatributos $subnivelatributos */
        $subnivelatributos = $this->subnivelatributosRepository->find($id);

        if (empty($subnivelatributos)) {
            return $this->sendError('Subnivelatributos not found');
        }

        $subnivelatributos->delete();

        return $this->sendResponse($id, 'Subnivelatributos deleted successfully');
    }
}
