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
        $id = Auth::id();
        $recyclings=\App\Recycling::where('id_user', $id)->get();
        return view('index_recycler',compact('recyclings'));
    }

    public function edit($id)
    {
        $user = Auth::id();
        return view('edit_recycler',compact('user','id'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name=$request->get('name');
        $user->telefone=$request->get('telefone');
        $user->endereco=$request->get('endereco');
        $user->save();
        return redirect('home');
    }

    public function logout()
    {
        Auth::logout();
        // return view('auth/login');
        return redirect('login');
    }
}
