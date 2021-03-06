<?php

namespace App\Http\Controllers;

use App\LogEntry;
use App\Ingredient;
use App\Unit;
use App\CalorieUnit;
use App\User;
use App\Goal;

class LogEntryController extends Controller
{
	public function show($id)
	{
		return view('entry', ['entry' => Ingredient::findOrFail($id)]);
	}

	public function add()
	{
		$time = "Breakfast";
		if (array_key_exists("entry-time", $_POST))
			$time = $_POST['entry-time'];
		
		return view('addEntry', ['ingredientsInfo' => null, 'units' => Unit::get(), 'meal' => $time]);
	}

	public function save()
	{
		$meal = $_POST['meal'];
		foreach ($_POST as $response => $val)
		{
			if (stripos($response, 'ingredient-') === 0) {
				$calorieUnit = new CalorieUnit;
				$calorieUnit->ingredient_id = $val;
				$calorieUnit->unit = $_POST["unit-ingredient-".$val];
				$calorieUnit->calories = 100;
				$calorieUnit->save();


				$logEntry = new LogEntry;
				$logEntry->ingredient_id = $val;
				$logEntry->log_date = date("Y-m-d H:i:s");
				$logEntry->category = $meal;
				$logEntry->quantity = $_POST["amount-ingredient-".$val];
				$logEntry->calorie_unit_id = $calorieUnit->id;
				$logEntry->user_id = 1;
				$logEntry->save();
			}
		}
		return redirect('/');
	}

	public function search()
	{
		return view('search');
	}
}