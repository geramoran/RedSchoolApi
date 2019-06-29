<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetallerRequest;
use App\Http\Requests\UpdatetallerRequest;
use App\Repositories\tallerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class tallerController extends AppBaseController
{
    /** @var  tallerRepository */
    private $tallerRepository;

    public function __construct(tallerRepository $tallerRepo)
    {
        $this->tallerRepository = $tallerRepo;
    }

    /**
     * Display a listing of the taller.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tallers = $this->tallerRepository->all();

        return view('tallers.index')
            ->with('tallers', $tallers);
    }

    /**
     * Show the form for creating a new taller.
     *
     * @return Response
     */
    public function create()
    {
        return view('tallers.create');
    }

    /**
     * Store a newly created taller in storage.
     *
     * @param CreatetallerRequest $request
     *
     * @return Response
     */
    public function store(CreatetallerRequest $request)
    {
        $input = $request->all();

        $taller = $this->tallerRepository->create($input);

        Flash::success('Taller saved successfully.');

        return redirect(route('tallers.index'));
    }

    /**
     * Display the specified taller.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $taller = $this->tallerRepository->find($id);

        if (empty($taller)) {
            Flash::error('Taller not found');

            return redirect(route('tallers.index'));
        }

        return view('tallers.show')->with('taller', $taller);
    }

    /**
     * Show the form for editing the specified taller.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $taller = $this->tallerRepository->find($id);

        if (empty($taller)) {
            Flash::error('Taller not found');

            return redirect(route('tallers.index'));
        }

        return view('tallers.edit')->with('taller', $taller);
    }

    /**
     * Update the specified taller in storage.
     *
     * @param int $id
     * @param UpdatetallerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetallerRequest $request)
    {
        $taller = $this->tallerRepository->find($id);

        if (empty($taller)) {
            Flash::error('Taller not found');

            return redirect(route('tallers.index'));
        }

        $taller = $this->tallerRepository->update($request->all(), $id);

        Flash::success('Taller updated successfully.');

        return redirect(route('tallers.index'));
    }

    /**
     * Remove the specified taller from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $taller = $this->tallerRepository->find($id);

        if (empty($taller)) {
            Flash::error('Taller not found');

            return redirect(route('tallers.index'));
        }

        $this->tallerRepository->delete($id);

        Flash::success('Taller deleted successfully.');

        return redirect(route('tallers.index'));
    }
}
