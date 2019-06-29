<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesubnivelRequest;
use App\Http\Requests\UpdatesubnivelRequest;
use App\Repositories\subnivelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class subnivelController extends AppBaseController
{
    /** @var  subnivelRepository */
    private $subnivelRepository;

    public function __construct(subnivelRepository $subnivelRepo)
    {
        $this->subnivelRepository = $subnivelRepo;
    }

    /**
     * Display a listing of the subnivel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subnivels = $this->subnivelRepository->all();

        return view('subnivels.index')
            ->with('subnivels', $subnivels);
    }

    /**
     * Show the form for creating a new subnivel.
     *
     * @return Response
     */
    public function create()
    {
        return view('subnivels.create');
    }

    /**
     * Store a newly created subnivel in storage.
     *
     * @param CreatesubnivelRequest $request
     *
     * @return Response
     */
    public function store(CreatesubnivelRequest $request)
    {
        $input = $request->all();

        $subnivel = $this->subnivelRepository->create($input);

        Flash::success('Subnivel saved successfully.');

        return redirect(route('subnivels.index'));
    }

    /**
     * Display the specified subnivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subnivel = $this->subnivelRepository->find($id);

        if (empty($subnivel)) {
            Flash::error('Subnivel not found');

            return redirect(route('subnivels.index'));
        }

        return view('subnivels.show')->with('subnivel', $subnivel);
    }

    /**
     * Show the form for editing the specified subnivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subnivel = $this->subnivelRepository->find($id);

        if (empty($subnivel)) {
            Flash::error('Subnivel not found');

            return redirect(route('subnivels.index'));
        }

        return view('subnivels.edit')->with('subnivel', $subnivel);
    }

    /**
     * Update the specified subnivel in storage.
     *
     * @param int $id
     * @param UpdatesubnivelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubnivelRequest $request)
    {
        $subnivel = $this->subnivelRepository->find($id);

        if (empty($subnivel)) {
            Flash::error('Subnivel not found');

            return redirect(route('subnivels.index'));
        }

        $subnivel = $this->subnivelRepository->update($request->all(), $id);

        Flash::success('Subnivel updated successfully.');

        return redirect(route('subnivels.index'));
    }

    /**
     * Remove the specified subnivel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subnivel = $this->subnivelRepository->find($id);

        if (empty($subnivel)) {
            Flash::error('Subnivel not found');

            return redirect(route('subnivels.index'));
        }

        $this->subnivelRepository->delete($id);

        Flash::success('Subnivel deleted successfully.');

        return redirect(route('subnivels.index'));
    }
}
