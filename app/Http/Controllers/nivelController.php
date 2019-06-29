<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenivelRequest;
use App\Http\Requests\UpdatenivelRequest;
use App\Repositories\nivelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class nivelController extends AppBaseController
{
    /** @var  nivelRepository */
    private $nivelRepository;

    public function __construct(nivelRepository $nivelRepo)
    {
        $this->nivelRepository = $nivelRepo;
    }

    /**
     * Display a listing of the nivel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nivels = $this->nivelRepository->all();

        return view('nivels.index')
            ->with('nivels', $nivels);
    }

    /**
     * Show the form for creating a new nivel.
     *
     * @return Response
     */
    public function create()
    {
        return view('nivels.create');
    }

    /**
     * Store a newly created nivel in storage.
     *
     * @param CreatenivelRequest $request
     *
     * @return Response
     */
    public function store(CreatenivelRequest $request)
    {
        $input = $request->all();

        $nivel = $this->nivelRepository->create($input);

        Flash::success('Nivel saved successfully.');

        return redirect(route('nivels.index'));
    }

    /**
     * Display the specified nivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nivel = $this->nivelRepository->find($id);

        if (empty($nivel)) {
            Flash::error('Nivel not found');

            return redirect(route('nivels.index'));
        }

        return view('nivels.show')->with('nivel', $nivel);
    }

    /**
     * Show the form for editing the specified nivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nivel = $this->nivelRepository->find($id);

        if (empty($nivel)) {
            Flash::error('Nivel not found');

            return redirect(route('nivels.index'));
        }

        return view('nivels.edit')->with('nivel', $nivel);
    }

    /**
     * Update the specified nivel in storage.
     *
     * @param int $id
     * @param UpdatenivelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenivelRequest $request)
    {
        $nivel = $this->nivelRepository->find($id);

        if (empty($nivel)) {
            Flash::error('Nivel not found');

            return redirect(route('nivels.index'));
        }

        $nivel = $this->nivelRepository->update($request->all(), $id);

        Flash::success('Nivel updated successfully.');

        return redirect(route('nivels.index'));
    }

    /**
     * Remove the specified nivel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nivel = $this->nivelRepository->find($id);

        if (empty($nivel)) {
            Flash::error('Nivel not found');

            return redirect(route('nivels.index'));
        }

        $this->nivelRepository->delete($id);

        Flash::success('Nivel deleted successfully.');

        return redirect(route('nivels.index'));
    }
}
