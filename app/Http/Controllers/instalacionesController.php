<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateinstalacionesRequest;
use App\Http\Requests\UpdateinstalacionesRequest;
use App\Repositories\instalacionesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class instalacionesController extends AppBaseController
{
    /** @var  instalacionesRepository */
    private $instalacionesRepository;

    public function __construct(instalacionesRepository $instalacionesRepo)
    {
        $this->instalacionesRepository = $instalacionesRepo;
    }

    /**
     * Display a listing of the instalaciones.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $instalaciones = $this->instalacionesRepository->all();

        return view('instalaciones.index')
            ->with('instalaciones', $instalaciones);
    }

    /**
     * Show the form for creating a new instalaciones.
     *
     * @return Response
     */
    public function create()
    {
        return view('instalaciones.create');
    }

    /**
     * Store a newly created instalaciones in storage.
     *
     * @param CreateinstalacionesRequest $request
     *
     * @return Response
     */
    public function store(CreateinstalacionesRequest $request)
    {
        $input = $request->all();

        $instalaciones = $this->instalacionesRepository->create($input);

        Flash::success('Instalaciones saved successfully.');

        return redirect(route('instalaciones.index'));
    }

    /**
     * Display the specified instalaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $instalaciones = $this->instalacionesRepository->find($id);

        if (empty($instalaciones)) {
            Flash::error('Instalaciones not found');

            return redirect(route('instalaciones.index'));
        }

        return view('instalaciones.show')->with('instalaciones', $instalaciones);
    }

    /**
     * Show the form for editing the specified instalaciones.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $instalaciones = $this->instalacionesRepository->find($id);

        if (empty($instalaciones)) {
            Flash::error('Instalaciones not found');

            return redirect(route('instalaciones.index'));
        }

        return view('instalaciones.edit')->with('instalaciones', $instalaciones);
    }

    /**
     * Update the specified instalaciones in storage.
     *
     * @param int $id
     * @param UpdateinstalacionesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinstalacionesRequest $request)
    {
        $instalaciones = $this->instalacionesRepository->find($id);

        if (empty($instalaciones)) {
            Flash::error('Instalaciones not found');

            return redirect(route('instalaciones.index'));
        }

        $instalaciones = $this->instalacionesRepository->update($request->all(), $id);

        Flash::success('Instalaciones updated successfully.');

        return redirect(route('instalaciones.index'));
    }

    /**
     * Remove the specified instalaciones from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $instalaciones = $this->instalacionesRepository->find($id);

        if (empty($instalaciones)) {
            Flash::error('Instalaciones not found');

            return redirect(route('instalaciones.index'));
        }

        $this->instalacionesRepository->delete($id);

        Flash::success('Instalaciones deleted successfully.');

        return redirect(route('instalaciones.index'));
    }
}
