<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\Paginator;
use App\User;
use App\Categorie;
use App\City;
use App\Announce;
use Auth;
use DB;

class PostController extends Controller
{
     
   public function __construct(){
     $this->middleware('auth');
   }

    //retourner la liste des catégories et les villes via la base de donneer dans le formulaire de creation
    public function listcat(){
        
        $categories = Categorie::all();
        $cities = City::all();
        return view ('creat',['categories'=> $categories, 'cities'=>$cities]);
    }

   
    
    public function store(Request $request){
      $announce = new Announce();
      $user = Auth::user();
      $data = request()->validate( [
        
        'title' => 'required|min:5',
        'description'=> 'required|min:10',
        'price'=> 'required|min:2',
        'city' => 'required',
        'category' => 'required'

      ]);
        
      
        $image1 = $request->file('image1');
        $image2 = $request->file('image2');
        
        $imagName1 = rand(). '-' .time(). '.' .$image1->getClientOriginalExtension();
        $imagName2 = rand(). '-' .time(). '.' .$image2->getClientOriginalExtension();
        
        request()->image1->move(public_path('storage'), $imagName1);
        request()->image2->move(public_path('storage'), $imagName2);
       
        
        
        $announce->id_category = request('category');
        $announce->id_city = request('city');
        $announce->id_user = $user->id;
        $announce->title = request('title');
        $announce->description = request('description');
        $announce->price = request('price');
        $announce->image1 = $imagName1;
        $announce->image2 = $imagName2;
        
        // dd($announce);
        $announce->save();

        session()->flash('success', 'L\'annonce à été bien enregistrer !!!');
        return redirect('list');
        
      }

    public function index(){
         $user = Auth::user();

         $list = DB::table('announces')
            ->join('cities', 'announces.id_city', '=', 'cities.id')
            ->join('categories', 'announces.id_category', '=', 'categories.id')
            ->select('announces.*', 'cities.name_city', 'categories.name_category')
            ->where('deleted_at', null)
            ->where('id_user', $user->id)
            ->orderBy('created_at', 'DESC')
            ->get();


         return view('list',['announces'=> $list]);
    }

    

    public function edit($id){
      $user = Auth::user();
      $ads = Announce::findOrfail($id);
      $categories = Categorie::all();
      $cities = City::all();
      $category_selected = Categorie::all()->where("id", $ads->id_category)->first(); 
      $city_selected = City::all()->where("id", $ads->id_city)->first(); 

      // dd($category_selected->id);
      return view('edit', ['categories'=> $categories, 'cities'=>$cities ,'ads'=>$ads, 'category_selected'=>$category_selected ,'city_selected'=>$city_selected]);
    }


    public function update(Request $request, $id){
      $user = Auth::user();
      $ads = Announce::findOrfail($id);
      $ads->id_category = $request->input('category');
      $ads->id_city = $request->input('city');
      $ads->title = $request->input('title');
      $ads->description = $request->input('description');
      $ads->price = $request->input('price');
      
      $ads->save();

      session()->flash('editer', 'L\'annonce à été bien Modifier !!!');

      return redirect('list');

    }

    public function destroy(Request $request, $id){
        $user = Auth::user();
        $ads = Announce::findOrfail($id);
        
        $ads->delete();
        session()->flash('editer', 'L\'annonce à été bien Supprimer !!!');

        return back();
    }


    

    public function show($id){
      $user = Auth::user();

      $show = DB::table('announces')
         ->join('cities', 'announces.id_city', '=', 'cities.id')
         ->join('categories', 'announces.id_category', '=', 'categories.id')
         ->select('announces.*', 'cities.name_city', 'categories.name_category')
         ->where('announces.id', $id)
         ->first();

      return view('show',['announces'=> $show]);
 }


 public function all(){
  
            // $listannonce = Announce::orderBy('created_at','desc')->paginate(4);

            $listannonce = DB::table('announces')
            ->join('users', 'announces.id_user', '=', 'users.id')
            ->join('cities', 'announces.id_city', '=', 'cities.id')
            ->join('categories', 'announces.id_category', '=', 'categories.id')
            ->select('announces.*', 'cities.name_city', 'categories.name_category','users.phone','users.email')
            ->orderBy('created_at','desc')
            ->where('deleted_at', null)
            // ->orderBy('created_at', 'DESC')
            ->paginate(5);
            
         return view('categ',['announces'=> $listannonce]);
 }


 public function postads(){

  // $announces=Announce::orderBy('created_at','desc')->paginate(4);
  $announces = DB::table('announces')
            ->join('users', 'announces.id_user', '=', 'users.id')
            ->join('cities', 'announces.id_city', '=', 'cities.id')
            ->join('categories', 'announces.id_category', '=', 'categories.id')
            ->select('announces.*', 'cities.name_city', 'categories.name_category','users.phone','users.email')
            ->where('deleted_at', null)
            ->get();

            // dd($announces);

    if (request('categories')) {
      $announces=$announces->where('id_category', request('categories'));
    }


 return view('postcat',['announces'=>$announces,]);
}



public function postcity(){

  // $announces=Announce::orderBy('created_at','desc')->paginate(4);
  $announces = DB::table('announces')
            ->join('users', 'announces.id_user', '=', 'users.id')
            ->join('cities', 'announces.id_city', '=', 'cities.id')
            ->join('categories', 'announces.id_category', '=', 'categories.id')
            ->select('announces.*', 'cities.name_city', 'categories.name_category','users.phone','users.email')
            ->where('deleted_at', null)
            ->get();
  
    if (request('cities')) {
      $announces=$announces->where('id_city', request('cities'));
    }


 return view('postcity',['announces'=>$announces,]);
}




public function recherche(){

  $announces = DB::table('announces')
            ->join('users', 'announces.id_user', '=', 'users.id')
            ->join('cities', 'announces.id_city', '=', 'cities.id')
            ->join('categories', 'announces.id_category', '=', 'categories.id')
            ->select('announces.*', 'cities.name_city', 'categories.name_category','users.phone','users.email')
            ->where('deleted_at', null)
            ->get();
  
    if(request('city')) {
      $city = request('city');
      $announces = DB::table('announces')
            ->join('users', 'announces.id_user', '=', 'users.id')
            ->join('cities', 'announces.id_city', '=', 'cities.id')
            ->join('categories', 'announces.id_category', '=', 'categories.id')
            ->select('announces.*', 'cities.name_city', 'categories.name_category','users.phone','users.email')
            ->where('deleted_at', null)
            ->where('cities.name_city',$city)
            ->orderBy('created_at','desc')
            ->get();
        if(request('category')) {
          $categorie  = request('category');
          $announces = DB::table('announces')
            ->join('users', 'announces.id_user', '=', 'users.id')
            ->join('cities', 'announces.id_city', '=', 'cities.id')
            ->join('categories', 'announces.id_category', '=', 'categories.id')
            ->select('announces.*', 'cities.name_city', 'categories.name_category','users.phone','users.email')
            ->where('deleted_at', null)
            ->where('cities.name_city',$city)
            ->where('categories.name_category',$categorie)
            ->orderBy('created_at','desc')
            ->get();
        }
    }
    // dd($announces);


 return view('recherche',['announces'=>$announces,]);
}



public function boot()
{
    Paginator::defaultView('view-categ');
    Paginator::defaultView('view-postcat');


}



}
