<?php

namespace App\Http\Controllers\manager;

use App\Declarations;
use App\Jobs\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class managerController extends Controller
{
    public function __construct()
    {
        $this -> middleware('manager');
    }

    public function show()
    {
        $declarations = Declarations::all();
        //return dd($declarations);
//        $manager = Auth::user();
//        dump($manager);
        return view('manager.show',['declarations'=>$declarations]);
    }

    public function store($id)
    {
        $declarations = Declarations::all();
        $declaration = Declarations::find($id);
        $declaration -> check = '1';
        $declaration -> save();
        return managerController::show();
        //return view('manager.show',['declarations'=>$declarations]);
    }
}
