<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecontactoAPIRequest;
use App\Http\Requests\API\UpdatecontactoAPIRequest;
use App\Models\contacto;
use App\Repositories\contactoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class contactoController
 * @package App\Http\Controllers\API
 */

class contactoAPIController extends AppBaseController
{
    /** @var  contactoRepository */
    private $contactoRepository;

    public function __construct(contactoRepository $contactoRepo)
    {
        $this->contactoRepository = $contactoRepo;
    }

    /**
     * Display a listing of the contacto.
     * GET|HEAD /contactos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $contactos = $this->contactoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($contactos->toArray(), 'Contactos retrieved successfully');
    }

    /**
     * Store a newly created contacto in storage.
     * POST /contactos
     *
     * @param CreatecontactoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecontactoAPIRequest $request)
    {
        $input = $request->all();

        $contacto = $this->contactoRepository->create($input);

        return $this->sendResponse($contacto->toArray(), 'Contacto saved successfully');
    }

    /**
     * Display the specified contacto.
     * GET|HEAD /contactos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var contacto $contacto */
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            return $this->sendError('Contacto not found');
        }

        return $this->sendResponse($contacto->toArray(), 'Contacto retrieved successfully');
    }

    /**
     * Update the specified contacto in storage.
     * PUT/PATCH /contactos/{id}
     *
     * @param int $id
     * @param UpdatecontactoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecontactoAPIRequest $request)
    {
        $input = $request->all();

        /** @var contacto $contacto */
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            return $this->sendError('Contacto not found');
        }

        $contacto = $this->contactoRepository->update($input, $id);

        return $this->sendResponse($contacto->toArray(), 'contacto updated successfully');
    }

    /**
     * Remove the specified contacto from storage.
     * DELETE /contactos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var contacto $contacto */
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            return $this->sendError('Contacto not found');
        }

        $contacto->delete();

        return $this->sendResponse($id, 'Contacto deleted successfully');
    }
}
