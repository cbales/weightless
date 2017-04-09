<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;

class SearchController extends Controller
{
    public function search(Request $request){
	   if($request->has('search')){
	      
	      $ingredients = Ingredient::search($request->input('search'))->get();
	   }
	   return view('search.results', compact('ingredients'));
	}
}
