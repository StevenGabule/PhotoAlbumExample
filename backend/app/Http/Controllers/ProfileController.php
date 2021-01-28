<?php

namespace App\Http\Controllers;

use App\{Album, User};
use Illuminate\Http\{Request, Response};
use App\Http\Resources\{AlbumResource, UserResource};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;

class ProfileController extends Controller
{
    /**
     * Get the profile information with albums
     *
     * @param Request $request
     * @param User $user
     * @return Application|ResponseFactory|Response
     */
    public function profile(Request $request, User $user)
    {
        if ($request->wantsJson()) {
            return response(new UserResource($user), Response::HTTP_OK);
        }
        return response(null, Response::HTTP_BAD_REQUEST);
    }

    /**
     * Get the album photos
     *
     * @param Request $request
     * @param User $user
     * @param Album $album
     * @return Application|ResponseFactory|Response
     */
    public function photos(Request $request, User $user, Album $album)
    {
        if ($request->wantsJson()) {
            return response(new AlbumResource($album), Response::HTTP_OK);
        }
        return response(null, Response::HTTP_BAD_REQUEST);
    }
}
