<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\City;
use Auth;
use App\Message;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Categorie::all();
        $cities = City::all();

        $messages = Message::where('id_seller', '=', auth()->user()->id)->get();
        return view ('/home',['categories'=> $categories, 'cities'=>$cities] , compact('messages'));
        
    }
}
