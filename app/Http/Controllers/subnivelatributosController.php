<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesubnivelatributosRequest;
use App\Http\Requests\UpdatesubnivelatributosRequest;
use App\Repositories\subnivelatributosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class subnivelatributosController extends AppBaseController
{
    /** @var  subnivelatributosRepository */
    private $subnivelatributosRepository;

    public function __construct(subnivelatributosRepository $subnivelatributosRepo)
    {
        $this->subnivelatributosRepository = $subnivelatributosRepo;
    }

    /**
     * Display a listing of the subnivelatributos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $subnivelatributos = $this->subnivelatributosRepository->all();

        return view('subnivelatributos.index')
            ->with('subnivelatributos', $subnivelatributos);
    }

    /**
     * Show the form for creating a new subnivelatributos.
     *
     * @return Response
     */
    public function create()
    {
        return view('subnivelatributos.create');
    }

    /**
     * Store a newly created subnivelatributos in storage.
     *
     * @param CreatesubnivelatributosRequest $request
     *
     * @return Response
     */
    public function store(CreatesubnivelatributosRequest $request)
    {
        $input = $request->all();

        $subnivelatributos = $this->subnivelatributosRepository->create($input);

        Flash::success('Subnivelatributos saved successfully.');

        return redirect(route('subnivelatributos.index'));
    }

    /**
     * Display the specified subnivelatributos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subnivelatributos = $this->subnivelatributosRepository->find($id);

        if (empty($subnivelatributos)) {
            Flash::error('Subnivelatributos not found');

            return redirect(route('subnivelatributos.index'));
        }

        return view('subnivelatributos.show')->with('subnivelatributos', $subnivelatributos);
    }

    /**
     * Show the form for editing the specified subnivelatributos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subnivelatributos = $this->subnivelatributosRepository->find($id);

        if (empty($subnivelatributos)) {
            Flash::error('Subnivelatributos not found');

            return redirect(route('subnivelatributos.index'));
        }

        return view('subnivelatributos.edit')->with('subnivelatributos', $subnivelatributos);
    }

    /**
     * Update the specified subnivelatributos in storage.
     *
     * @param int $id
     * @param UpdatesubnivelatributosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubnivelatributosRequest $request)
    {
        $subnivelatributos = $this->subnivelatributosRepository->find($id);

        if (empty($subnivelatributos)) {
            Flash::error('Subnivelatributos not found');

            return redirect(route('subnivelatributos.index'));
        }

        $subnivelatributos = $this->subnivelatributosRepository->update($request->all(), $id);

        Flash::success('Subnivelatributos updated successfully.');

        return redirect(route('subnivelatributos.index'));
    }

    /**
     * Remove the specified subnivelatributos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subnivelatributos = $this->subnivelatributosRepository->find($id);

        if (empty($subnivelatributos)) {
            Flash::error('Subnivelatributos not found');

            return redirect(route('subnivelatributos.index'));
        }

        $this->subnivelatributosRepository->delete($id);

        Flash::success('Subnivelatributos deleted successfully.');

        return redirect(route('subnivelatributos.index'));
    }
}
