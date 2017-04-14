<?php

namespace App\Http\Controllers;

use App\LogEntry;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
	public function show()
	{
		$today = new \DateTime();
		$today = $today->format("Y-m-d") . " 00:00:00";

		$tomorrow = new \DateTime(); 
		$tomorrow->add(new \DateInterval('P1D'));
		$tomorrow = $tomorrow->format("Y-m-d") . " 00:00:00";

		$logEntries = LogEntry::where('log_date', '>=', $today)->where('log_date', '<', $tomorrow)->get();

		$breakfast = LogEntry::where('log_date', '>=', $today)->where('log_date', '<', $tomorrow)->where('category', 'Breakfast')->with('Ingredient')->get();

		$lunch = LogEntry::where('log_date', '>=', $today)->where('log_date', '<', $tomorrow)->where('category', 'Lunch')->get();

		$dinner = LogEntry::where('log_date', '>=', $today)->where('log_date', '<', $tomorrow)->where('category', 'Dinner')->get();

		$snacks = LogEntry::where('log_date', '>=', $today)->where('log_date', '<', $tomorrow)->where('category', 'Snacks')->get();


		return view('log', ['logEntries' => $logEntries, 'breakfast' => $breakfast, 'lunch' => $lunch, 'dinner' => $dinner, 'snacks' => $snacks]);
	}
}