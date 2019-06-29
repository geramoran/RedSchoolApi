<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatereconocimientosRequest;
use App\Http\Requests\UpdatereconocimientosRequest;
use App\Repositories\reconocimientosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class reconocimientosController extends AppBaseController
{
    /** @var  reconocimientosRepository */
    private $reconocimientosRepository;

    public function __construct(reconocimientosRepository $reconocimientosRepo)
    {
        $this->reconocimientosRepository = $reconocimientosRepo;
    }

    /**
     * Display a listing of the reconocimientos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $reconocimientos = $this->reconocimientosRepository->all();

        return view('reconocimientos.index')
            ->with('reconocimientos', $reconocimientos);
    }

    /**
     * Show the form for creating a new reconocimientos.
     *
     * @return Response
     */
    public function create()
    {
        return view('reconocimientos.create');
    }

    /**
     * Store a newly created reconocimientos in storage.
     *
     * @param CreatereconocimientosRequest $request
     *
     * @return Response
     */
    public function store(CreatereconocimientosRequest $request)
    {
        $input = $request->all();

        $reconocimientos = $this->reconocimientosRepository->create($input);

        Flash::success('Reconocimientos saved successfully.');

        return redirect(route('reconocimientos.index'));
    }

    /**
     * Display the specified reconocimientos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reconocimientos = $this->reconocimientosRepository->find($id);

        if (empty($reconocimientos)) {
            Flash::error('Reconocimientos not found');

            return redirect(route('reconocimientos.index'));
        }

        return view('reconocimientos.show')->with('reconocimientos', $reconocimientos);
    }

    /**
     * Show the form for editing the specified reconocimientos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $reconocimientos = $this->reconocimientosRepository->find($id);

        if (empty($reconocimientos)) {
            Flash::error('Reconocimientos not found');

            return redirect(route('reconocimientos.index'));
        }

        return view('reconocimientos.edit')->with('reconocimientos', $reconocimientos);
    }

    /**
     * Update the specified reconocimientos in storage.
     *
     * @param int $id
     * @param UpdatereconocimientosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereconocimientosRequest $request)
    {
        $reconocimientos = $this->reconocimientosRepository->find($id);

        if (empty($reconocimientos)) {
            Flash::error('Reconocimientos not found');

            return redirect(route('reconocimientos.index'));
        }

        $reconocimientos = $this->reconocimientosRepository->update($request->all(), $id);

        Flash::success('Reconocimientos updated successfully.');

        return redirect(route('reconocimientos.index'));
    }

    /**
     * Remove the specified reconocimientos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reconocimientos = $this->reconocimientosRepository->find($id);

        if (empty($reconocimientos)) {
            Flash::error('Reconocimientos not found');

            return redirect(route('reconocimientos.index'));
        }

        $this->reconocimientosRepository->delete($id);

        Flash::success('Reconocimientos deleted successfully.');

        return redirect(route('reconocimientos.index'));
    }
}
