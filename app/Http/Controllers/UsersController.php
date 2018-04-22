<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Users;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        
        return view('users.index', [
            'users' => $users,
            ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        
        return view('users.show', [
            'user' => $user,
        ]);
    }
}
