<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;
use App\Unit;
use App\CalorieUnit;

class SearchController extends Controller
{
    public function search(Request $request){
	   if($request->has('search')){
	      
	      $ingredients = Ingredient::search($request->input('search'))->get();
	   }

	   $ingredientsInfo = array();

	   foreach ($ingredients as $ingredient) {
	   		$ingredientInfo = array();
	   		$ingredientInfo["ingredient"] = $ingredient;

	   		$calorieUnits = CalorieUnit::where('ingredient_id', $ingredient->id)->get();
	   		$unitIds = array();

	   		foreach ($calorieUnits as $calorieUnit) {
	   			$unitIds[] = $calorieUnit->unit;
	   		}

	   		$units = Unit::whereIn('id', $unitIds)->get();

	   		$ingredientInfo["units"] = $units;

	   		$ingredientsInfo[] = $ingredientInfo;
	   }

	   return view('addEntry', array('ingredientsInfo' => $ingredientsInfo));
	}
}
