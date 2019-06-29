<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepuntosfuertesRequest;
use App\Http\Requests\UpdatepuntosfuertesRequest;
use App\Repositories\puntosfuertesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class puntosfuertesController extends AppBaseController
{
    /** @var  puntosfuertesRepository */
    private $puntosfuertesRepository;

    public function __construct(puntosfuertesRepository $puntosfuertesRepo)
    {
        $this->puntosfuertesRepository = $puntosfuertesRepo;
    }

    /**
     * Display a listing of the puntosfuertes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $puntosfuertes = $this->puntosfuertesRepository->all();

        return view('puntosfuertes.index')
            ->with('puntosfuertes', $puntosfuertes);
    }

    /**
     * Show the form for creating a new puntosfuertes.
     *
     * @return Response
     */
    public function create()
    {
        return view('puntosfuertes.create');
    }

    /**
     * Store a newly created puntosfuertes in storage.
     *
     * @param CreatepuntosfuertesRequest $request
     *
     * @return Response
     */
    public function store(CreatepuntosfuertesRequest $request)
    {
        $input = $request->all();

        $puntosfuertes = $this->puntosfuertesRepository->create($input);

        Flash::success('Puntosfuertes saved successfully.');

        return redirect(route('puntosfuertes.index'));
    }

    /**
     * Display the specified puntosfuertes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $puntosfuertes = $this->puntosfuertesRepository->find($id);

        if (empty($puntosfuertes)) {
            Flash::error('Puntosfuertes not found');

            return redirect(route('puntosfuertes.index'));
        }

        return view('puntosfuertes.show')->with('puntosfuertes', $puntosfuertes);
    }

    /**
     * Show the form for editing the specified puntosfuertes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $puntosfuertes = $this->puntosfuertesRepository->find($id);

        if (empty($puntosfuertes)) {
            Flash::error('Puntosfuertes not found');

            return redirect(route('puntosfuertes.index'));
        }

        return view('puntosfuertes.edit')->with('puntosfuertes', $puntosfuertes);
    }

    /**
     * Update the specified puntosfuertes in storage.
     *
     * @param int $id
     * @param UpdatepuntosfuertesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepuntosfuertesRequest $request)
    {
        $puntosfuertes = $this->puntosfuertesRepository->find($id);

        if (empty($puntosfuertes)) {
            Flash::error('Puntosfuertes not found');

            return redirect(route('puntosfuertes.index'));
        }

        $puntosfuertes = $this->puntosfuertesRepository->update($request->all(), $id);

        Flash::success('Puntosfuertes updated successfully.');

        return redirect(route('puntosfuertes.index'));
    }

    /**
     * Remove the specified puntosfuertes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $puntosfuertes = $this->puntosfuertesRepository->find($id);

        if (empty($puntosfuertes)) {
            Flash::error('Puntosfuertes not found');

            return redirect(route('puntosfuertes.index'));
        }

        $this->puntosfuertesRepository->delete($id);

        Flash::success('Puntosfuertes deleted successfully.');

        return redirect(route('puntosfuertes.index'));
    }
}
