<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            //unsigned big Int
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();
            $table->timestamps();

            //Add forgin keys. Here I connect the user_id to the user table and the oposite for role_id
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            //table. foregin key is role_id, this foren key references the id in the roles table. Makes it difficult to delete the roles
            //If a role is beign deleted, but someone has that role, it will restrict the delete
            //If a user has a role and the id of user changed then the id will change too
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
            //Even after this laravel does not know that these tables are related
            //after migrating, only the database knows that they are related. 
            //Go into model
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role');
    }
}
