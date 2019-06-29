<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateescuelaAPIRequest;
use App\Http\Requests\API\UpdateescuelaAPIRequest;
use App\Models\escuela;
use App\Repositories\escuelaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class escuelaController
 * @package App\Http\Controllers\API
 */

class escuelaAPIController extends AppBaseController
{
    /** @var  escuelaRepository */
    private $escuelaRepository;

    public function __construct(escuelaRepository $escuelaRepo)
    {
        $this->escuelaRepository = $escuelaRepo;
    }

    /**
     * Display a listing of the escuela.
     * GET|HEAD /escuelas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $escuelas = $this->escuelaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($escuelas->toArray(), 'Escuelas retrieved successfully');
    }

    /**
     * Store a newly created escuela in storage.
     * POST /escuelas
     *
     * @param CreateescuelaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateescuelaAPIRequest $request)
    {
        $input = $request->all();

        $escuela = $this->escuelaRepository->create($input);

        return $this->sendResponse($escuela->toArray(), 'Escuela saved successfully');
    }

    /**
     * Display the specified escuela.
     * GET|HEAD /escuelas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var escuela $escuela */
        $escuela = $this->escuelaRepository->find($id);

        if (empty($escuela)) {
            return $this->sendError('Escuela not found');
        }

        return $this->sendResponse($escuela->toArray(), 'Escuela retrieved successfully');
    }

    /**
     * Update the specified escuela in storage.
     * PUT/PATCH /escuelas/{id}
     *
     * @param int $id
     * @param UpdateescuelaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateescuelaAPIRequest $request)
    {
        $input = $request->all();

        /** @var escuela $escuela */
        $escuela = $this->escuelaRepository->find($id);

        if (empty($escuela)) {
            return $this->sendError('Escuela not found');
        }

        $escuela = $this->escuelaRepository->update($input, $id);

        return $this->sendResponse($escuela->toArray(), 'escuela updated successfully');
    }

    /**
     * Remove the specified escuela from storage.
     * DELETE /escuelas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var escuela $escuela */
        $escuela = $this->escuelaRepository->find($id);

        if (empty($escuela)) {
            return $this->sendError('Escuela not found');
        }

        $escuela->delete();

        return $this->sendResponse($id, 'Escuela deleted successfully');
    }
}
