<?php

namespace App\Http\Controllers;

use App\LogEntry;
use App\Ingredient;

class LogEntryController extends Controller
{
	public function show($id)
	{
		return view('entry', ['entry' => Ingredient::findOrFail($id)]);
	}

	public function add()
	{
		return view('addEntry', ['ingredients' => Ingredient::get()]);
	}

	public function save()
	{
		print_r($_POST);

		foreach ($_POST as $response => $val)
		{
			if (stripos($response, 'ingredient-')) {
				echo $val;
				//$logEntry = new LogEntry('ingredient-id' => $val);
			}
		}
	}
}