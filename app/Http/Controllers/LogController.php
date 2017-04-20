<?php

namespace App\Http\Controllers;

use App\LogEntry;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
	public function showDefault() {
		$today = new \DateTime();
		$today = $today->format("Y-m-d") . " 00:00:00";

		$tomorrow = new \DateTime(); 
		$tomorrow->add(new \DateInterval('P1D'));
		$tomorrow = $tomorrow->format("Y-m-d") . " 00:00:00";
		
		$logEntries = $this->getLogEntries($today, $tomorrow);

		$stringDate = new \DateTime();
		$stringDate = $stringDate->format("l, M jS");

		$yesterday = new \DateTime();
		$yesterday->sub(new \DateInterval('P1D'));
		$yesterday = $yesterday->format("Y-m-d");

		return view('log', ['date' => $stringDate, 'prev' => $yesterday, 'next' => $tomorrow, 'logEntries' => $logEntries, 'breakfast' => $logEntries["breakfast"], 'lunch' => $logEntries["lunch"], 'dinner' => $logEntries["dinner"], 'snacks' => $logEntries["snacks"]]);
	}
	public function show ($date)
	{
		$today = new \DateTime($date);
		$today = $today->format("Y-m-d") . " 00:00:00";

		$tomorrow = new \DateTime($date); 
		$tomorrow->add(new \DateInterval('P1D'));
		$tomorrow = $tomorrow->format("Y-m-d") . " 00:00:00";

		$logEntries = $this->getLogEntries($today, $tomorrow);

		$stringDate = new \DateTime($date);
		$stringDate = $stringDate->format("l, M jS");

		$yesterday = new \DateTime($date);
		$yesterday->sub(new \DateInterval('P1D'));
		$yesterday = $yesterday->format("Y-m-d");

		return view('log', ['date' => $stringDate, 'prev' => $yesterday, 'next' => $tomorrow, 'logEntries' => $logEntries, 'breakfast' => $logEntries["breakfast"], 'lunch' => $logEntries["lunch"], 'dinner' => $logEntries["dinner"], 'snacks' => $logEntries["snacks"]]);
	}

	public function getLogEntries($start, $end) {
		$logEntries = array();

		$logEntries["breakfast"] = LogEntry::where('log_date', '>=', $start)->where('log_date', '<', $end)->where('category', 'Breakfast')->with('Ingredient')->get();

		$logEntries["lunch"] = LogEntry::where('log_date', '>=', $start)->where('log_date', '<', $end)->where('category', 'Lunch')->get();

		$logEntries["dinner"] = LogEntry::where('log_date', '>=', $start)->where('log_date', '<', $end)->where('category', 'Dinner')->get();

		$logEntries["snacks"] = LogEntry::where('log_date', '>=', $start)->where('log_date', '<', $end)->where('category', 'Snacks')->get();

		return $logEntries;
	}
}