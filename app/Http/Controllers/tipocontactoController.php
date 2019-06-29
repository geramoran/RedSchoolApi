<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetipocontactoRequest;
use App\Http\Requests\UpdatetipocontactoRequest;
use App\Repositories\tipocontactoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tipocontactoController extends AppBaseController
{
    /** @var  tipocontactoRepository */
    private $tipocontactoRepository;

    public function __construct(tipocontactoRepository $tipocontactoRepo)
    {
        $this->tipocontactoRepository = $tipocontactoRepo;
    }

    /**
     * Display a listing of the tipocontacto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipocontactos = $this->tipocontactoRepository->all();

        return view('tipocontactos.index')
            ->with('tipocontactos', $tipocontactos);
    }

    /**
     * Show the form for creating a new tipocontacto.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipocontactos.create');
    }

    /**
     * Store a newly created tipocontacto in storage.
     *
     * @param CreatetipocontactoRequest $request
     *
     * @return Response
     */
    public function store(CreatetipocontactoRequest $request)
    {
        $input = $request->all();

        $tipocontacto = $this->tipocontactoRepository->create($input);

        Flash::success('Tipocontacto saved successfully.');

        return redirect(route('tipocontactos.index'));
    }

    /**
     * Display the specified tipocontacto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipocontacto = $this->tipocontactoRepository->find($id);

        if (empty($tipocontacto)) {
            Flash::error('Tipocontacto not found');

            return redirect(route('tipocontactos.index'));
        }

        return view('tipocontactos.show')->with('tipocontacto', $tipocontacto);
    }

    /**
     * Show the form for editing the specified tipocontacto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipocontacto = $this->tipocontactoRepository->find($id);

        if (empty($tipocontacto)) {
            Flash::error('Tipocontacto not found');

            return redirect(route('tipocontactos.index'));
        }

        return view('tipocontactos.edit')->with('tipocontacto', $tipocontacto);
    }

    /**
     * Update the specified tipocontacto in storage.
     *
     * @param int $id
     * @param UpdatetipocontactoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipocontactoRequest $request)
    {
        $tipocontacto = $this->tipocontactoRepository->find($id);

        if (empty($tipocontacto)) {
            Flash::error('Tipocontacto not found');

            return redirect(route('tipocontactos.index'));
        }

        $tipocontacto = $this->tipocontactoRepository->update($request->all(), $id);

        Flash::success('Tipocontacto updated successfully.');

        return redirect(route('tipocontactos.index'));
    }

    /**
     * Remove the specified tipocontacto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipocontacto = $this->tipocontactoRepository->find($id);

        if (empty($tipocontacto)) {
            Flash::error('Tipocontacto not found');

            return redirect(route('tipocontactos.index'));
        }

        $this->tipocontactoRepository->delete($id);

        Flash::success('Tipocontacto deleted successfully.');

        return redirect(route('tipocontactos.index'));
    }
}
