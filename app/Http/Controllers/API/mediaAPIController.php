<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemediaAPIRequest;
use App\Http\Requests\API\UpdatemediaAPIRequest;
use App\Models\media;
use App\Repositories\mediaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class mediaController
 * @package App\Http\Controllers\API
 */

class mediaAPIController extends AppBaseController
{
    /** @var  mediaRepository */
    private $mediaRepository;

    public function __construct(mediaRepository $mediaRepo)
    {
        $this->mediaRepository = $mediaRepo;
    }

    /**
     * Display a listing of the media.
     * GET|HEAD /media
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $media = $this->mediaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($media->toArray(), 'Media retrieved successfully');
    }

    /**
     * Store a newly created media in storage.
     * POST /media
     *
     * @param CreatemediaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatemediaAPIRequest $request)
    {
        $input = $request->all();

        $media = $this->mediaRepository->create($input);

        return $this->sendResponse($media->toArray(), 'Media saved successfully');
    }

    /**
     * Display the specified media.
     * GET|HEAD /media/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var media $media */
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            return $this->sendError('Media not found');
        }

        return $this->sendResponse($media->toArray(), 'Media retrieved successfully');
    }

    /**
     * Update the specified media in storage.
     * PUT/PATCH /media/{id}
     *
     * @param int $id
     * @param UpdatemediaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemediaAPIRequest $request)
    {
        $input = $request->all();

        /** @var media $media */
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            return $this->sendError('Media not found');
        }

        $media = $this->mediaRepository->update($input, $id);

        return $this->sendResponse($media->toArray(), 'media updated successfully');
    }

    /**
     * Remove the specified media from storage.
     * DELETE /media/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var media $media */
        $media = $this->mediaRepository->find($id);

        if (empty($media)) {
            return $this->sendError('Media not found');
        }

        $media->delete();

        return $this->sendResponse($id, 'Media deleted successfully');
    }
}
