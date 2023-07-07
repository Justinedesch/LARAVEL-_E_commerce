<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View|Application|Factory
    {
        $cats = Categories::all();
        return view('homepage', [ 'cats' => $cats ]);
    }
}
