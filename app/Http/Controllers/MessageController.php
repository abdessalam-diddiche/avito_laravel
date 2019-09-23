<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Announce;
use Auth;
use DB;

class MessageController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
      }


    public function create(Request $request){
        
        $id_seller = $request['id_seller'];
        $id_annonce = $request['id_annonce'];
        return view('message', compact('id_seller', 'id_annonce'));
    }

    public function store(Request $request){
        
        $message = new Message();
        $message->content = $request['content'];
        $message->id_seller = $request['id_seller'];
        $message->id_buyer = $request['id_buyer'];
        $message->id_annonce = $request['id_annonce'];
        // dd($message);
        $message->save();
        session()->flash('success', 'Le message à bien été envoyer !!!');
        return back();

    }
}
