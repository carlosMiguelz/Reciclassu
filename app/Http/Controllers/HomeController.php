<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

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
    public function index()
    {   
        return view('index_recycler');
    }

    public function edit($id)
    {
        $user = Auth::id();
        return view('edit_recycler',compact('user','id'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::id();
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->number=$request->get('telefone');
        $user->office=$request->get('endereco');
        $user->save();
        return redirect('home');
    }
}
