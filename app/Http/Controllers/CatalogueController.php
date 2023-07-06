<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    function catalogue() {
        return view('catalogue');
      }
}