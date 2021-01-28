<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\{Request, Response};

class UserController extends Controller
{
    /**
     * Get all the users
     *
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $users = User::latest()->get();
            return response(UserResource::collection($users), Response::HTTP_OK);
        }
    }
}
