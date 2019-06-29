<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecontactoRequest;
use App\Http\Requests\UpdatecontactoRequest;
use App\Repositories\contactoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class contactoController extends AppBaseController
{
    /** @var  contactoRepository */
    private $contactoRepository;

    public function __construct(contactoRepository $contactoRepo)
    {
        $this->contactoRepository = $contactoRepo;
    }

    /**
     * Display a listing of the contacto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contactos = $this->contactoRepository->all();

        return view('contactos.index')
            ->with('contactos', $contactos);
    }

    /**
     * Show the form for creating a new contacto.
     *
     * @return Response
     */
    public function create()
    {
        return view('contactos.create');
    }

    /**
     * Store a newly created contacto in storage.
     *
     * @param CreatecontactoRequest $request
     *
     * @return Response
     */
    public function store(CreatecontactoRequest $request)
    {
        $input = $request->all();

        $contacto = $this->contactoRepository->create($input);

        Flash::success('Contacto saved successfully.');

        return redirect(route('contactos.index'));
    }

    /**
     * Display the specified contacto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            Flash::error('Contacto not found');

            return redirect(route('contactos.index'));
        }

        return view('contactos.show')->with('contacto', $contacto);
    }

    /**
     * Show the form for editing the specified contacto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            Flash::error('Contacto not found');

            return redirect(route('contactos.index'));
        }

        return view('contactos.edit')->with('contacto', $contacto);
    }

    /**
     * Update the specified contacto in storage.
     *
     * @param int $id
     * @param UpdatecontactoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecontactoRequest $request)
    {
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            Flash::error('Contacto not found');

            return redirect(route('contactos.index'));
        }

        $contacto = $this->contactoRepository->update($request->all(), $id);

        Flash::success('Contacto updated successfully.');

        return redirect(route('contactos.index'));
    }

    /**
     * Remove the specified contacto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contacto = $this->contactoRepository->find($id);

        if (empty($contacto)) {
            Flash::error('Contacto not found');

            return redirect(route('contactos.index'));
        }

        $this->contactoRepository->delete($id);

        Flash::success('Contacto deleted successfully.');

        return redirect(route('contactos.index'));
    }
}
