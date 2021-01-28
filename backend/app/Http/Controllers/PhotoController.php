<?php

namespace App\Http\Controllers;

use App\Photo;
use Exception;
use App\Http\Requests\{PhotoCreateRequest, PhotoUpdateRequest};
use Illuminate\Http\{Response};

class PhotoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param PhotoCreateRequest $request
     * @return Response
     */
    public function store(PhotoCreateRequest $request)
    {
        if ($request->wantsJson()) {
            $photo = Photo::create($request->only('album_id', 'title', 'url', 'thumbnail_url'));
            return response($photo, Response::HTTP_CREATED);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Photo $photo
     * @return Response
     */
    public function edit(Photo $photo)
    {
        if (request()->wantsJson()) {
            return response($photo, Response::HTTP_OK);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PhotoUpdateRequest $request
     * @param Photo $photo
     * @return Response
     */
    public function update(PhotoUpdateRequest $request, Photo $photo)
    {
        if ($request->wantsJson()) {
            $photo = $photo->update($request->only('title', 'url', 'thumbnail_url'));
            return response($photo, Response::HTTP_ACCEPTED);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Photo $photo
     * @return Response
     * @throws Exception
     */
    public function destroy(Photo $photo)
    {
        if (request()->wantsJson()) {
            $photo->delete();
            return response(null, Response::HTTP_NO_CONTENT);
        }
    }
}
