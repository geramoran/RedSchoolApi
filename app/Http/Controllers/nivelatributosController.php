<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenivelatributosRequest;
use App\Http\Requests\UpdatenivelatributosRequest;
use App\Repositories\nivelatributosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class nivelatributosController extends AppBaseController
{
    /** @var  nivelatributosRepository */
    private $nivelatributosRepository;

    public function __construct(nivelatributosRepository $nivelatributosRepo)
    {
        $this->nivelatributosRepository = $nivelatributosRepo;
    }

    /**
     * Display a listing of the nivelatributos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nivelatributos = $this->nivelatributosRepository->all();

        return view('nivelatributos.index')
            ->with('nivelatributos', $nivelatributos);
    }

    /**
     * Show the form for creating a new nivelatributos.
     *
     * @return Response
     */
    public function create()
    {
        return view('nivelatributos.create');
    }

    /**
     * Store a newly created nivelatributos in storage.
     *
     * @param CreatenivelatributosRequest $request
     *
     * @return Response
     */
    public function store(CreatenivelatributosRequest $request)
    {
        $input = $request->all();

        $nivelatributos = $this->nivelatributosRepository->create($input);

        Flash::success('Nivelatributos saved successfully.');

        return redirect(route('nivelatributos.index'));
    }

    /**
     * Display the specified nivelatributos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nivelatributos = $this->nivelatributosRepository->find($id);

        if (empty($nivelatributos)) {
            Flash::error('Nivelatributos not found');

            return redirect(route('nivelatributos.index'));
        }

        return view('nivelatributos.show')->with('nivelatributos', $nivelatributos);
    }

    /**
     * Show the form for editing the specified nivelatributos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nivelatributos = $this->nivelatributosRepository->find($id);

        if (empty($nivelatributos)) {
            Flash::error('Nivelatributos not found');

            return redirect(route('nivelatributos.index'));
        }

        return view('nivelatributos.edit')->with('nivelatributos', $nivelatributos);
    }

    /**
     * Update the specified nivelatributos in storage.
     *
     * @param int $id
     * @param UpdatenivelatributosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenivelatributosRequest $request)
    {
        $nivelatributos = $this->nivelatributosRepository->find($id);

        if (empty($nivelatributos)) {
            Flash::error('Nivelatributos not found');

            return redirect(route('nivelatributos.index'));
        }

        $nivelatributos = $this->nivelatributosRepository->update($request->all(), $id);

        Flash::success('Nivelatributos updated successfully.');

        return redirect(route('nivelatributos.index'));
    }

    /**
     * Remove the specified nivelatributos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nivelatributos = $this->nivelatributosRepository->find($id);

        if (empty($nivelatributos)) {
            Flash::error('Nivelatributos not found');

            return redirect(route('nivelatributos.index'));
        }

        $this->nivelatributosRepository->delete($id);

        Flash::success('Nivelatributos deleted successfully.');

        return redirect(route('nivelatributos.index'));
    }
}
