<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ingredient;

class LogEntry extends Model
{
    public function ingredient()
    {
    	return $this->hasOne('App\Ingredient');
    }
}
