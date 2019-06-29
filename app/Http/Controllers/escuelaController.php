<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateescuelaRequest;
use App\Http\Requests\UpdateescuelaRequest;
use App\Repositories\escuelaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class escuelaController extends AppBaseController
{
    /** @var  escuelaRepository */
    private $escuelaRepository;

    public function __construct(escuelaRepository $escuelaRepo)
    {
        $this->escuelaRepository = $escuelaRepo;
    }

    /**
     * Display a listing of the escuela.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $escuelas = $this->escuelaRepository->all();

        return view('escuelas.index')
            ->with('escuelas', $escuelas);
    }

    /**
     * Show the form for creating a new escuela.
     *
     * @return Response
     */
    public function create()
    {
        return view('escuelas.create');
    }

    /**
     * Store a newly created escuela in storage.
     *
     * @param CreateescuelaRequest $request
     *
     * @return Response
     */
    public function store(CreateescuelaRequest $request)
    {
        $input = $request->all();

        $escuela = $this->escuelaRepository->create($input);

        Flash::success('Escuela saved successfully.');

        return redirect(route('escuelas.index'));
    }

    /**
     * Display the specified escuela.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $escuela = $this->escuelaRepository->find($id);

        if (empty($escuela)) {
            Flash::error('Escuela not found');

            return redirect(route('escuelas.index'));
        }

        return view('escuelas.show')->with('escuela', $escuela);
    }

    /**
     * Show the form for editing the specified escuela.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $escuela = $this->escuelaRepository->find($id);

        if (empty($escuela)) {
            Flash::error('Escuela not found');

            return redirect(route('escuelas.index'));
        }

        return view('escuelas.edit')->with('escuela', $escuela);
    }

    /**
     * Update the specified escuela in storage.
     *
     * @param int $id
     * @param UpdateescuelaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateescuelaRequest $request)
    {
        $escuela = $this->escuelaRepository->find($id);

        if (empty($escuela)) {
            Flash::error('Escuela not found');

            return redirect(route('escuelas.index'));
        }

        $escuela = $this->escuelaRepository->update($request->all(), $id);

        Flash::success('Escuela updated successfully.');

        return redirect(route('escuelas.index'));
    }

    /**
     * Remove the specified escuela from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $escuela = $this->escuelaRepository->find($id);

        if (empty($escuela)) {
            Flash::error('Escuela not found');

            return redirect(route('escuelas.index'));
        }

        $this->escuelaRepository->delete($id);

        Flash::success('Escuela deleted successfully.');

        return redirect(route('escuelas.index'));
    }
}
