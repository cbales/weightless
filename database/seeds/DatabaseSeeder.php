<?php

use Illuminate\Database\Seeder;
use App\Unit;
use App\User;
use App\Source;
use App\Ingredient;
use App\CalorieUnit;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsdaSeeder');

        $this->command->info('USDA info seeded');
    }
}

class UsdaSeeder extends Seeder
{
	public function run()
	{
		User::create(array('name' => 'SYSTEM', 'email' => 'email@email', 'password' => 'Hx8e3nxy2!frj'));
		Source::create(array('name' => 'USDA', 'user_id' => 1));

		$usdaFileCount = ceil(8489/150);

		for ($i = 1; $i <= $usdaFileCount; $i++) {
			$usdaData = file_get_contents("seed/usda" . $i . ".json");
			$usdaData = json_decode($usdaData, true);

			foreach ($usdaData['report']['foods'] as $food) {
				$ingredient = Ingredient::create(array('name' => $food['name'], 'source_id' => 1, 'type' => 'ingredient'));
				$unit = Unit::where('name', $food['measure'])->get();
				
				if (count($unit) == 0) {
					$unit = Unit::create(array('name' => $food['measure'], 'abbreviation' => $food['measure']));
				} else {
					$unit = $unit[0];
				}

				// If USDA does not have calorie info, they denote the value as "--"
				if ($food['nutrients'][0]['value'] != "--") {
					CalorieUnit::create(array(
						'ingredient_id' => $ingredient->id, 
						'unit' => $unit->id, 
						'calories' => $food['nutrients'][0]['value']
						));
				}
			}
		}
		
	}
}