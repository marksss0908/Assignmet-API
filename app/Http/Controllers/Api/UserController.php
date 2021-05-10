<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        return [
            'name' => 'Juan Tamad',
            'grade' => 90,
        ];
    }
}
