<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Model
use App\User;

class UserController extends Controller
{
    public function getUsers()
    {
        return User::all();
    }
}
``
