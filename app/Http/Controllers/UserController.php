<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(Cache::remember('users', 86400, function () {
            return User::all();
        }));
    }
}
