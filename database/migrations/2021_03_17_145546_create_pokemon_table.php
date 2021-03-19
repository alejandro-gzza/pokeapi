<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();

            $table->integer('pokemon_id');
            $table->string('name', 50);
            $table->string('front_img')->nullable();
            $table->string('back_img')->nullable();
            $table->integer('weight');
            $table->integer('height');
            $table->string('type');
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
}
