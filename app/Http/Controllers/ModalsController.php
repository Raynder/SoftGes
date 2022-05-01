<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalsController extends Controller
{
    public function index(Request $request)
    {
        return view('modals.'.$request->modal);
    }
}
