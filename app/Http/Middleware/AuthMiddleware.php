<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    public function handle(Request $request, Closure $next, $metodoAut)
    {
        session_start();
        if(isset($_SESSION['email'])){
            return $next($request);
        }
        else{
            return redirect()->route('app.login',['erro' => 2]);
        }
    }
}
