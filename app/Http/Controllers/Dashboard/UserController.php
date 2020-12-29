<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(){
        return view('dashboard.users.list', ['users' => User::orderBy('id', 'Desc')->get() ]);
    }

}
