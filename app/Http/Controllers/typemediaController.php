<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetypemediaRequest;
use App\Http\Requests\UpdatetypemediaRequest;
use App\Repositories\typemediaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class typemediaController extends AppBaseController
{
    /** @var  typemediaRepository */
    private $typemediaRepository;

    public function __construct(typemediaRepository $typemediaRepo)
    {
        $this->typemediaRepository = $typemediaRepo;
    }

    /**
     * Display a listing of the typemedia.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $typemedia = $this->typemediaRepository->all();

        return view('typemedia.index')
            ->with('typemedia', $typemedia);
    }

    /**
     * Show the form for creating a new typemedia.
     *
     * @return Response
     */
    public function create()
    {
        return view('typemedia.create');
    }

    /**
     * Store a newly created typemedia in storage.
     *
     * @param CreatetypemediaRequest $request
     *
     * @return Response
     */
    public function store(CreatetypemediaRequest $request)
    {
        $input = $request->all();

        $typemedia = $this->typemediaRepository->create($input);

        Flash::success('Typemedia saved successfully.');

        return redirect(route('typemedia.index'));
    }

    /**
     * Display the specified typemedia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typemedia = $this->typemediaRepository->find($id);

        if (empty($typemedia)) {
            Flash::error('Typemedia not found');

            return redirect(route('typemedia.index'));
        }

        return view('typemedia.show')->with('typemedia', $typemedia);
    }

    /**
     * Show the form for editing the specified typemedia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typemedia = $this->typemediaRepository->find($id);

        if (empty($typemedia)) {
            Flash::error('Typemedia not found');

            return redirect(route('typemedia.index'));
        }

        return view('typemedia.edit')->with('typemedia', $typemedia);
    }

    /**
     * Update the specified typemedia in storage.
     *
     * @param int $id
     * @param UpdatetypemediaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetypemediaRequest $request)
    {
        $typemedia = $this->typemediaRepository->find($id);

        if (empty($typemedia)) {
            Flash::error('Typemedia not found');

            return redirect(route('typemedia.index'));
        }

        $typemedia = $this->typemediaRepository->update($request->all(), $id);

        Flash::success('Typemedia updated successfully.');

        return redirect(route('typemedia.index'));
    }

    /**
     * Remove the specified typemedia from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typemedia = $this->typemediaRepository->find($id);

        if (empty($typemedia)) {
            Flash::error('Typemedia not found');

            return redirect(route('typemedia.index'));
        }

        $this->typemediaRepository->delete($id);

        Flash::success('Typemedia deleted successfully.');

        return redirect(route('typemedia.index'));
    }
}
