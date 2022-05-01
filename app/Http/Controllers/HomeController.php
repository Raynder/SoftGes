<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if(isset($_GET['search']) && $_GET['search'] != ''){
            $perfil = User::where('name', 'like', '%'.$_GET['search'].'%')->get()[0];
            return view('home.index', compact('user', 'perfil'));
        }
        return view('home.index', compact('user'));
    }

    public function update(Request $request){
        User::find(Auth::user()->id)->update($request->all());

        return redirect()->route('home');
    }
}
