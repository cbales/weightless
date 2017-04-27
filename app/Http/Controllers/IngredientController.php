<?php

namespace App\Http\Controllers;

use App\Ingredient;

class IngredientController extends Controller
{
	public function show($id)
	{
	return view('ingredient', ['ingredient' => Ingredient::findOrFail($id)]);
	}
}