<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //This will create the game table with these attrabutes
    public function up()
    {
        //Create the table games and add columes to this table
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('info');
            $table->integer('price');
            $table->date('release_date');
            $table->string('contact_email');
            $table->string('contact_phone');
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
        Schema::dropIfExists('games');
    }
}
