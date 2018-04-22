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
        $microposts = $user->microposts()->orderBy('create_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
}
