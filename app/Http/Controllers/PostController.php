<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Categorie;
use App\City;
use App\Announce;

class PostController extends Controller
{
    //retourner la liste des catégories et les villes via la base de donneer dans le formulaire de creation
    public function listcat(){
        
        $categories = Categorie::all();
        $cities = City::all();
        return view ('creat',['categories'=> $categories, 'cities'=>$cities]);
    }

    public function index(){

    }

    public function creat(){
      
    }

    public function store(Request $request){
        $announce = new Announce();

        $announce->id_category = $request->select('category');
        $announce->id_city = $request->select('city');
        $announce->title = $request->input('title');
        $announce->description = $request->input('description');
        $announce->price = $request->input('price');
        
        if($request->hasfile('image1')){
          $announce->image1 = $request->image1->store('image');
        }
        if($request->hasfile('image2')){
            $announce->image2 = $request->image2->store('image');
          }
         
        
          dd($announce);

        $announce->save();
        return back();
    
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destory(){
        
    }


}
