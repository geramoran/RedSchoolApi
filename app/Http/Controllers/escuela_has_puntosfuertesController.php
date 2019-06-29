<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createescuela_has_puntosfuertesRequest;
use App\Http\Requests\Updateescuela_has_puntosfuertesRequest;
use App\Repositories\escuela_has_puntosfuertesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class escuela_has_puntosfuertesController extends AppBaseController
{
    /** @var  escuela_has_puntosfuertesRepository */
    private $escuelaHasPuntosfuertesRepository;

    public function __construct(escuela_has_puntosfuertesRepository $escuelaHasPuntosfuertesRepo)
    {
        $this->escuelaHasPuntosfuertesRepository = $escuelaHasPuntosfuertesRepo;
    }

    /**
     * Display a listing of the escuela_has_puntosfuertes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->all();

        return view('escuela_has_puntosfuertes.index')
            ->with('escuelaHasPuntosfuertes', $escuelaHasPuntosfuertes);
    }

    /**
     * Show the form for creating a new escuela_has_puntosfuertes.
     *
     * @return Response
     */
    public function create()
    {
        return view('escuela_has_puntosfuertes.create');
    }

    /**
     * Store a newly created escuela_has_puntosfuertes in storage.
     *
     * @param Createescuela_has_puntosfuertesRequest $request
     *
     * @return Response
     */
    public function store(Createescuela_has_puntosfuertesRequest $request)
    {
        $input = $request->all();

        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->create($input);

        Flash::success('Escuela Has Puntosfuertes saved successfully.');

        return redirect(route('escuelaHasPuntosfuertes.index'));
    }

    /**
     * Display the specified escuela_has_puntosfuertes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->find($id);

        if (empty($escuelaHasPuntosfuertes)) {
            Flash::error('Escuela Has Puntosfuertes not found');

            return redirect(route('escuelaHasPuntosfuertes.index'));
        }

        return view('escuela_has_puntosfuertes.show')->with('escuelaHasPuntosfuertes', $escuelaHasPuntosfuertes);
    }

    /**
     * Show the form for editing the specified escuela_has_puntosfuertes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->find($id);

        if (empty($escuelaHasPuntosfuertes)) {
            Flash::error('Escuela Has Puntosfuertes not found');

            return redirect(route('escuelaHasPuntosfuertes.index'));
        }

        return view('escuela_has_puntosfuertes.edit')->with('escuelaHasPuntosfuertes', $escuelaHasPuntosfuertes);
    }

    /**
     * Update the specified escuela_has_puntosfuertes in storage.
     *
     * @param int $id
     * @param Updateescuela_has_puntosfuertesRequest $request
     *
     * @return Response
     */
    public function update($id, Updateescuela_has_puntosfuertesRequest $request)
    {
        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->find($id);

        if (empty($escuelaHasPuntosfuertes)) {
            Flash::error('Escuela Has Puntosfuertes not found');

            return redirect(route('escuelaHasPuntosfuertes.index'));
        }

        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->update($request->all(), $id);

        Flash::success('Escuela Has Puntosfuertes updated successfully.');

        return redirect(route('escuelaHasPuntosfuertes.index'));
    }

    /**
     * Remove the specified escuela_has_puntosfuertes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $escuelaHasPuntosfuertes = $this->escuelaHasPuntosfuertesRepository->find($id);

        if (empty($escuelaHasPuntosfuertes)) {
            Flash::error('Escuela Has Puntosfuertes not found');

            return redirect(route('escuelaHasPuntosfuertes.index'));
        }

        $this->escuelaHasPuntosfuertesRepository->delete($id);

        Flash::success('Escuela Has Puntosfuertes deleted successfully.');

        return redirect(route('escuelaHasPuntosfuertes.index'));
    }
}
