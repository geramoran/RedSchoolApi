<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetypemediaAPIRequest;
use App\Http\Requests\API\UpdatetypemediaAPIRequest;
use App\Models\typemedia;
use App\Repositories\typemediaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class typemediaController
 * @package App\Http\Controllers\API
 */

class typemediaAPIController extends AppBaseController
{
    /** @var  typemediaRepository */
    private $typemediaRepository;

    public function __construct(typemediaRepository $typemediaRepo)
    {
        $this->typemediaRepository = $typemediaRepo;
    }

    /**
     * Display a listing of the typemedia.
     * GET|HEAD /typemedia
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $typemedia = $this->typemediaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($typemedia->toArray(), 'Typemedia retrieved successfully');
    }

    /**
     * Store a newly created typemedia in storage.
     * POST /typemedia
     *
     * @param CreatetypemediaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetypemediaAPIRequest $request)
    {
        $input = $request->all();

        $typemedia = $this->typemediaRepository->create($input);

        return $this->sendResponse($typemedia->toArray(), 'Typemedia saved successfully');
    }

    /**
     * Display the specified typemedia.
     * GET|HEAD /typemedia/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var typemedia $typemedia */
        $typemedia = $this->typemediaRepository->find($id);

        if (empty($typemedia)) {
            return $this->sendError('Typemedia not found');
        }

        return $this->sendResponse($typemedia->toArray(), 'Typemedia retrieved successfully');
    }

    /**
     * Update the specified typemedia in storage.
     * PUT/PATCH /typemedia/{id}
     *
     * @param int $id
     * @param UpdatetypemediaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetypemediaAPIRequest $request)
    {
        $input = $request->all();

        /** @var typemedia $typemedia */
        $typemedia = $this->typemediaRepository->find($id);

        if (empty($typemedia)) {
            return $this->sendError('Typemedia not found');
        }

        $typemedia = $this->typemediaRepository->update($input, $id);

        return $this->sendResponse($typemedia->toArray(), 'typemedia updated successfully');
    }

    /**
     * Remove the specified typemedia from storage.
     * DELETE /typemedia/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var typemedia $typemedia */
        $typemedia = $this->typemediaRepository->find($id);

        if (empty($typemedia)) {
            return $this->sendError('Typemedia not found');
        }

        $typemedia->delete();

        return $this->sendResponse($id, 'Typemedia deleted successfully');
    }
}
