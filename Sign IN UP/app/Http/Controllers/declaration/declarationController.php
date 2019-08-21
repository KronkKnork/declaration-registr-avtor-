<?php

namespace App\Http\Controllers\declaration;

use App\Declarations;
use App\Jobs\SendMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class declarationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('declaration.declaration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $timeDay
     * @return string
     */
    public function store(Request $request)
    {
        $declaration_time = new Declarations();
        $declaration_time = $declaration_time -> where('users_id', Auth::user()->id)->latest('created_at')->first();
        if ($declaration_time <> null) {
            if ($declaration_time->created_at > Carbon::now()->subDay()) {
                Session::flash('flash message', 'You can\'t use feedback today!');
                return view('declaration.declaration');
            }
        }
        if ($request->isMethod('post')) {
           $request->validate([
               'name_declaration' => 'required|max:255',
               'declaration' => 'required',
               'url_image' => 'max:2048',
           ]);
       }

        $declaration = new Declarations();

        $declaration->name_declaration = $request->name_declaration;
        $declaration->users_id = Auth::user()->id;
        $declaration->declaration = $request->declaration;
        if ($request->file('url_image') != null) {                                           //если есть картинка,
            $path = $request->file('url_image')->store('images');                      //то загрузить в images
            $declaration->url_image = asset('storage/app/' . $path);
        }
        $declaration->save();

        $data_message = $declaration;
        SendMail::dispatch($data_message)-> delay(now()->addMinutes(1));                   //отправка письма спустя 1 минуту
        //dispatch(new SendMail($data_message));
        return view('declaration.successfulDeclaration');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
