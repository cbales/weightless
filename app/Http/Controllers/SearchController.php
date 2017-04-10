<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Unit;

class SearchController extends Controller
{
    public function search(Request $request){
	   if($request->has('search')){
	      
	      $ingredients = Ingredient::search($request->input('search'))->get();
	   }
	   $units = Unit::get();
	   return view('addEntry', array('ingredients' => $ingredients, 'units' => $units));
	}
}
