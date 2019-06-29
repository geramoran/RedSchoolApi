<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemediaRequest;
use App\Http\Requests\UpdatemediaRequest;
use App\Repositories\mediaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class mediaController extends AppBaseController
{
    /** @var  mediaRepository */
    private $mediaRepository;

    public function __construct(mediaRepository $mediaRepo)
    {
        $this->mediaRepository = $mediaRepo;
    }

    /**
     * Display a listing of the media.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $media = $this->mediaRepository->all();

        return view('media.index')
            ->with('media', $media);
    }

    /**
     * Show the form for creating a new media.
     *
     * @return Response
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created media in storage.
     *
     * @param CreatemediaRequest $request
     *
     * @return Response
     */
    public function store(CreatemediaRequest $request)
    {
        $input = $request->all();

        $media = $this->mediaRepository->create($input);

        Flash::success('Media saved successfully.');

        return redirect(route('media.index'));
    }

    /**
     * Display the specified media.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            Flash::error('Media not found');

            return redirect(route('media.index'));
        }

        return view('media.show')->with('media', $media);
    }

    /**
     * Show the form for editing the specified media.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            Flash::error('Media not found');

            return redirect(route('media.index'));
        }

        return view('media.edit')->with('media', $media);
    }

    /**
     * Update the specified media in storage.
     *
     * @param int $id
     * @param UpdatemediaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemediaRequest $request)
    {
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            Flash::error('Media not found');

            return redirect(route('media.index'));
        }

        $media = $this->mediaRepository->update($request->all(), $id);

        Flash::success('Media updated successfully.');

        return redirect(route('media.index'));
    }

    /**
     * Remove the specified media from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            Flash::error('Media not found');

            return redirect(route('media.index'));
        }

        $this->mediaRepository->delete($id);

        Flash::success('Media deleted successfully.');

        return redirect(route('media.index'));
    }
}
