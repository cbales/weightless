<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalorieUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calorie_units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient_id')->length(10)->unsigned();
            $table->integer('unit')->length(10)->unsigned();
            $table->double('calories');
            $table->timestamps();
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
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
        Schema::dropIfExists('calorie_units');
    }
}
