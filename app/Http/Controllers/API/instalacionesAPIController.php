<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateinstalacionesAPIRequest;
use App\Http\Requests\API\UpdateinstalacionesAPIRequest;
use App\Models\instalaciones;
use App\Repositories\instalacionesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class instalacionesController
 * @package App\Http\Controllers\API
 */

class instalacionesAPIController extends AppBaseController
{
    /** @var  instalacionesRepository */
    private $instalacionesRepository;

    public function __construct(instalacionesRepository $instalacionesRepo)
    {
        $this->instalacionesRepository = $instalacionesRepo;
    }

    /**
     * Display a listing of the instalaciones.
     * GET|HEAD /instalaciones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $instalaciones = $this->instalacionesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($instalaciones->toArray(), 'Instalaciones retrieved successfully');
    }

    /**
     * Store a newly created instalaciones in storage.
     * POST /instalaciones
     *
     * @param CreateinstalacionesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateinstalacionesAPIRequest $request)
    {
        $input = $request->all();

        $instalaciones = $this->instalacionesRepository->create($input);

        return $this->sendResponse($instalaciones->toArray(), 'Instalaciones saved successfully');
    }

    /**
     * Display the specified instalaciones.
     * GET|HEAD /instalaciones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var instalaciones $instalaciones */
        $instalaciones = $this->instalacionesRepository->find($id);

        if (empty($instalaciones)) {
            return $this->sendError('Instalaciones not found');
        }

        return $this->sendResponse($instalaciones->toArray(), 'Instalaciones retrieved successfully');
    }

    /**
     * Update the specified instalaciones in storage.
     * PUT/PATCH /instalaciones/{id}
     *
     * @param int $id
     * @param UpdateinstalacionesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinstalacionesAPIRequest $request)
    {
        $input = $request->all();

        /** @var instalaciones $instalaciones */
        $instalaciones = $this->instalacionesRepository->find($id);

        if (empty($instalaciones)) {
            return $this->sendError('Instalaciones not found');
        }

        $instalaciones = $this->instalacionesRepository->update($input, $id);

        return $this->sendResponse($instalaciones->toArray(), 'instalaciones updated successfully');
    }

    /**
     * Remove the specified instalaciones from storage.
     * DELETE /instalaciones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var instalaciones $instalaciones */
        $instalaciones = $this->instalacionesRepository->find($id);

        if (empty($instalaciones)) {
            return $this->sendError('Instalaciones not found');
        }

        $instalaciones->delete();

        return $this->sendResponse($id, 'Instalaciones deleted successfully');
    }
}
