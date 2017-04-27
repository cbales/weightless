<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient_id')->length(10)->unsigned();
            $table->date('log_date');
            $table->string('category');
            $table->double('quantity');
            $table->integer('calorie_unit_id')->length(10)->unsigned();
            $table->integer('user_id')->length(10)->unsigned();
            $table->timestamps();
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->foreign('calorie_unit_id')->references('id')->on('calorie_units');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_entries');
    }
}
