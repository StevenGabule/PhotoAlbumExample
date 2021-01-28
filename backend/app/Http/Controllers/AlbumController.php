<?php

namespace App\Http\Controllers;

use App\Album;
use Exception;
use App\Http\Requests\{AlbumUpdateRequest, AlbumCreateRequest};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\{ Response};

class AlbumController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param AlbumCreateRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function store(AlbumCreateRequest $request)
    {
        if ($request->wantsJson()) {
            $album = Album::create($request->only('title', 'user_id'));
            return response($album, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     * @return Response
     */
    public function show(Album $album)
    {
        if (request()->wantsJson()) {
            return response($album, Response::HTTP_OK);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AlbumUpdateRequest $request
     * @param Album $album
     * @return Response
     */
    public function update(AlbumUpdateRequest $request, Album $album)
    {
        if ($request->wantsJson()) {
            $result = $album->update($request->only('title'));
            return response($result, Response::HTTP_ACCEPTED);
        }
    }

    /**
     * Remove album information
     *
     * @param Album $album
     * @return Response
     * @throws Exception
     */
    public function destroy(Album $album)
    {
        if (request()->wantsJson()) {
            $album->delete();
            return response(null, Response::HTTP_NO_CONTENT);
        }
    }
}
