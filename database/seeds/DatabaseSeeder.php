<?php

use Illuminate\Database\Seeder;
use App\Unit;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UnitSeeder');

        $this->command->info('Unit table seeded');
    }
}

class UnitSeeder extends Seeder
{
	public function run()
	{
		Unit::create(array('name' => 'pounds', 'abbreviation' => 'lbs'));
		Unit::create(array('name' => 'ounces', 'abbreviation' => 'oz'));
		Unit::create(array('name' => 'grams', 'abbreviation' => 'g'));
		Unit::create(array('name' => 'fluid ounces', 'abbreviation' => 'fl. oz'));
		Unit::create(array('name' => 'teaspoons', 'abbreviation' => 'tsp'));
		Unit::create(array('name' => 'tablespoons', 'abbreviation' => 'Tbsp'));
		Unit::create(array('name' => 'cups', 'abbreviation' => 'c'));
	}
}