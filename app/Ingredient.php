<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ingredient extends Model
{
    use Searchable;
}
