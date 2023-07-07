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
    public function getAllUsers(): View|Application|Factory
    {
        $users = DB::select('SELECT * FROM users');
        $cats = DB::select('SELECT * FROM categories');

//        dd($cats);

        return view('test', ['users' => $users, 'cats' => $cats ] );
    }

    public function getUserInfo(int $id): View|Application|Factory
    {
//        $user = DB::select('SELECT * FROM users WHERE users.id = '.$id);
        $user = User::find($id);
        return \view('test1', ['user' => $user]);
    }
}
