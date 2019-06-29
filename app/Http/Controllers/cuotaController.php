<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecuotaRequest;
use App\Http\Requests\UpdatecuotaRequest;
use App\Repositories\cuotaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class cuotaController extends AppBaseController
{
    /** @var  cuotaRepository */
    private $cuotaRepository;

    public function __construct(cuotaRepository $cuotaRepo)
    {
        $this->cuotaRepository = $cuotaRepo;
    }

    /**
     * Display a listing of the cuota.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cuotas = $this->cuotaRepository->all();

        return view('cuotas.index')
            ->with('cuotas', $cuotas);
    }

    /**
     * Show the form for creating a new cuota.
     *
     * @return Response
     */
    public function create()
    {
        return view('cuotas.create');
    }

    /**
     * Store a newly created cuota in storage.
     *
     * @param CreatecuotaRequest $request
     *
     * @return Response
     */
    public function store(CreatecuotaRequest $request)
    {
        $input = $request->all();

        $cuota = $this->cuotaRepository->create($input);

        Flash::success('Cuota saved successfully.');

        return redirect(route('cuotas.index'));
    }

    /**
     * Display the specified cuota.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cuota = $this->cuotaRepository->find($id);

        if (empty($cuota)) {
            Flash::error('Cuota not found');

            return redirect(route('cuotas.index'));
        }

        return view('cuotas.show')->with('cuota', $cuota);
    }

    /**
     * Show the form for editing the specified cuota.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cuota = $this->cuotaRepository->find($id);

        if (empty($cuota)) {
            Flash::error('Cuota not found');

            return redirect(route('cuotas.index'));
        }

        return view('cuotas.edit')->with('cuota', $cuota);
    }

    /**
     * Update the specified cuota in storage.
     *
     * @param int $id
     * @param UpdatecuotaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecuotaRequest $request)
    {
        $cuota = $this->cuotaRepository->find($id);

        if (empty($cuota)) {
            Flash::error('Cuota not found');

            return redirect(route('cuotas.index'));
        }

        $cuota = $this->cuotaRepository->update($request->all(), $id);

        Flash::success('Cuota updated successfully.');

        return redirect(route('cuotas.index'));
    }

    /**
     * Remove the specified cuota from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cuota = $this->cuotaRepository->find($id);

        if (empty($cuota)) {
            Flash::error('Cuota not found');

            return redirect(route('cuotas.index'));
        }

        $this->cuotaRepository->delete($id);

        Flash::success('Cuota deleted successfully.');

        return redirect(route('cuotas.index'));
    }
}
