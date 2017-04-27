<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient_id')->length(10)->unsigned();
            $table->integer('recipe_id')->length(10)->unsigned();
            $table->double('quantity');
            $table->integer('unit')->length(10)->unsigned();
            $table->timestamps();
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            //$table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('unit')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ingredients');
    }
}
