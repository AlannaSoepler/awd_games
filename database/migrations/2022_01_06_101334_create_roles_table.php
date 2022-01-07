<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            //auto increments 
            $table->id();
            //In the table roles i will have an attribute name, which is a tring. For example User and Admin
            $table->string('name');
            //In table roles, attribute description. For example An Ordinary User
            $table->string('description');
            //It gives date and time. From my understadning it is just for extra presition. 
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
        Schema::dropIfExists('roles');
    }
}
