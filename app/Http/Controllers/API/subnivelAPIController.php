<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesubnivelAPIRequest;
use App\Http\Requests\API\UpdatesubnivelAPIRequest;
use App\Models\subnivel;
use App\Repositories\subnivelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class subnivelController
 * @package App\Http\Controllers\API
 */

class subnivelAPIController extends AppBaseController
{
    /** @var  subnivelRepository */
    private $subnivelRepository;

    public function __construct(subnivelRepository $subnivelRepo)
    {
        $this->subnivelRepository = $subnivelRepo;
    }

    /**
     * Display a listing of the subnivel.
     * GET|HEAD /subnivels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $subnivels = $this->subnivelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($subnivels->toArray(), 'Subnivels retrieved successfully');
    }

    /**
     * Store a newly created subnivel in storage.
     * POST /subnivels
     *
     * @param CreatesubnivelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesubnivelAPIRequest $request)
    {
        $input = $request->all();

        $subnivel = $this->subnivelRepository->create($input);

        return $this->sendResponse($subnivel->toArray(), 'Subnivel saved successfully');
    }

    /**
     * Display the specified subnivel.
     * GET|HEAD /subnivels/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var subnivel $subnivel */
        $subnivel = $this->subnivelRepository->find($id);

        if (empty($subnivel)) {
            return $this->sendError('Subnivel not found');
        }

        return $this->sendResponse($subnivel->toArray(), 'Subnivel retrieved successfully');
    }

    /**
     * Update the specified subnivel in storage.
     * PUT/PATCH /subnivels/{id}
     *
     * @param int $id
     * @param UpdatesubnivelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubnivelAPIRequest $request)
    {
        $input = $request->all();

        /** @var subnivel $subnivel */
        $subnivel = $this->subnivelRepository->find($id);

        if (empty($subnivel)) {
            return $this->sendError('Subnivel not found');
        }

        $subnivel = $this->subnivelRepository->update($input, $id);

        return $this->sendResponse($subnivel->toArray(), 'subnivel updated successfully');
    }

    /**
     * Remove the specified subnivel from storage.
     * DELETE /subnivels/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var subnivel $subnivel */
        $subnivel = $this->subnivelRepository->find($id);

        if (empty($subnivel)) {
            return $this->sendError('Subnivel not found');
        }

        $subnivel->delete();

        return $this->sendResponse($id, 'Subnivel deleted successfully');
    }
}
