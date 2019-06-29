<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createtaller_has_escuelaRequest;
use App\Http\Requests\Updatetaller_has_escuelaRequest;
use App\Repositories\taller_has_escuelaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class taller_has_escuelaController extends AppBaseController
{
    /** @var  taller_has_escuelaRepository */
    private $tallerHasEscuelaRepository;

    public function __construct(taller_has_escuelaRepository $tallerHasEscuelaRepo)
    {
        $this->tallerHasEscuelaRepository = $tallerHasEscuelaRepo;
    }

    /**
     * Display a listing of the taller_has_escuela.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tallerHasEscuelas = $this->tallerHasEscuelaRepository->all();

        return view('taller_has_escuelas.index')
            ->with('tallerHasEscuelas', $tallerHasEscuelas);
    }

    /**
     * Show the form for creating a new taller_has_escuela.
     *
     * @return Response
     */
    public function create()
    {
        return view('taller_has_escuelas.create');
    }

    /**
     * Store a newly created taller_has_escuela in storage.
     *
     * @param Createtaller_has_escuelaRequest $request
     *
     * @return Response
     */
    public function store(Createtaller_has_escuelaRequest $request)
    {
        $input = $request->all();

        $tallerHasEscuela = $this->tallerHasEscuelaRepository->create($input);

        Flash::success('Taller Has Escuela saved successfully.');

        return redirect(route('tallerHasEscuelas.index'));
    }

    /**
     * Display the specified taller_has_escuela.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tallerHasEscuela = $this->tallerHasEscuelaRepository->find($id);

        if (empty($tallerHasEscuela)) {
            Flash::error('Taller Has Escuela not found');

            return redirect(route('tallerHasEscuelas.index'));
        }

        return view('taller_has_escuelas.show')->with('tallerHasEscuela', $tallerHasEscuela);
    }

    /**
     * Show the form for editing the specified taller_has_escuela.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tallerHasEscuela = $this->tallerHasEscuelaRepository->find($id);

        if (empty($tallerHasEscuela)) {
            Flash::error('Taller Has Escuela not found');

            return redirect(route('tallerHasEscuelas.index'));
        }

        return view('taller_has_escuelas.edit')->with('tallerHasEscuela', $tallerHasEscuela);
    }

    /**
     * Update the specified taller_has_escuela in storage.
     *
     * @param int $id
     * @param Updatetaller_has_escuelaRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetaller_has_escuelaRequest $request)
    {
        $tallerHasEscuela = $this->tallerHasEscuelaRepository->find($id);

        if (empty($tallerHasEscuela)) {
            Flash::error('Taller Has Escuela not found');

            return redirect(route('tallerHasEscuelas.index'));
        }

        $tallerHasEscuela = $this->tallerHasEscuelaRepository->update($request->all(), $id);

        Flash::success('Taller Has Escuela updated successfully.');

        return redirect(route('tallerHasEscuelas.index'));
    }

    /**
     * Remove the specified taller_has_escuela from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tallerHasEscuela = $this->tallerHasEscuelaRepository->find($id);

        if (empty($tallerHasEscuela)) {
            Flash::error('Taller Has Escuela not found');

            return redirect(route('tallerHasEscuelas.index'));
        }

        $this->tallerHasEscuelaRepository->delete($id);

        Flash::success('Taller Has Escuela deleted successfully.');

        return redirect(route('tallerHasEscuelas.index'));
    }
}
