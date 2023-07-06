<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getAllUsers(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = DB::select('SELECT * FROM users');

        return view('test', ['users' => $users] );
    }

    public function getUserInfo(int $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::find($id);
        return \view('test1', ['user' => $user]);
    }
}
