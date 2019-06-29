<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createescuela_has_nivelRequest;
use App\Http\Requests\Updateescuela_has_nivelRequest;
use App\Repositories\escuela_has_nivelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class escuela_has_nivelController extends AppBaseController
{
    /** @var  escuela_has_nivelRepository */
    private $escuelaHasNivelRepository;

    public function __construct(escuela_has_nivelRepository $escuelaHasNivelRepo)
    {
        $this->escuelaHasNivelRepository = $escuelaHasNivelRepo;
    }

    /**
     * Display a listing of the escuela_has_nivel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $escuelaHasNivels = $this->escuelaHasNivelRepository->all();

        return view('escuela_has_nivels.index')
            ->with('escuelaHasNivels', $escuelaHasNivels);
    }

    /**
     * Show the form for creating a new escuela_has_nivel.
     *
     * @return Response
     */
    public function create()
    {
        return view('escuela_has_nivels.create');
    }

    /**
     * Store a newly created escuela_has_nivel in storage.
     *
     * @param Createescuela_has_nivelRequest $request
     *
     * @return Response
     */
    public function store(Createescuela_has_nivelRequest $request)
    {
        $input = $request->all();

        $escuelaHasNivel = $this->escuelaHasNivelRepository->create($input);

        Flash::success('Escuela Has Nivel saved successfully.');

        return redirect(route('escuelaHasNivels.index'));
    }

    /**
     * Display the specified escuela_has_nivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $escuelaHasNivel = $this->escuelaHasNivelRepository->find($id);

        if (empty($escuelaHasNivel)) {
            Flash::error('Escuela Has Nivel not found');

            return redirect(route('escuelaHasNivels.index'));
        }

        return view('escuela_has_nivels.show')->with('escuelaHasNivel', $escuelaHasNivel);
    }

    /**
     * Show the form for editing the specified escuela_has_nivel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $escuelaHasNivel = $this->escuelaHasNivelRepository->find($id);

        if (empty($escuelaHasNivel)) {
            Flash::error('Escuela Has Nivel not found');

            return redirect(route('escuelaHasNivels.index'));
        }

        return view('escuela_has_nivels.edit')->with('escuelaHasNivel', $escuelaHasNivel);
    }

    /**
     * Update the specified escuela_has_nivel in storage.
     *
     * @param int $id
     * @param Updateescuela_has_nivelRequest $request
     *
     * @return Response
     */
    public function update($id, Updateescuela_has_nivelRequest $request)
    {
        $escuelaHasNivel = $this->escuelaHasNivelRepository->find($id);

        if (empty($escuelaHasNivel)) {
            Flash::error('Escuela Has Nivel not found');

            return redirect(route('escuelaHasNivels.index'));
        }

        $escuelaHasNivel = $this->escuelaHasNivelRepository->update($request->all(), $id);

        Flash::success('Escuela Has Nivel updated successfully.');

        return redirect(route('escuelaHasNivels.index'));
    }

    /**
     * Remove the specified escuela_has_nivel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $escuelaHasNivel = $this->escuelaHasNivelRepository->find($id);

        if (empty($escuelaHasNivel)) {
            Flash::error('Escuela Has Nivel not found');

            return redirect(route('escuelaHasNivels.index'));
        }

        $this->escuelaHasNivelRepository->delete($id);

        Flash::success('Escuela Has Nivel deleted successfully.');

        return redirect(route('escuelaHasNivels.index'));
    }
}
