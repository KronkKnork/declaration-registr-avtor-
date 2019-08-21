<?php

namespace App\Http\Controllers;

use App\Http\Controllers\declaration\declarationController;
use App\Http\Controllers\manager\managerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//$request, Closure $next
    public function index()
    {
        if (Auth::user()->is_manager) {
            //return route('manger');
            return (new manager\managerController)->show();
        } else {
            //return view('declaration.declaration');
            return (new declaration\declarationController)->index();
        }
    }
}
