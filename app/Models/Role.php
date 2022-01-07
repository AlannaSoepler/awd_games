<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    //This is where i defin the inverce of the relationship between roles and users.
    //app/model/role refers to the file location
    //After that i myst wrote user_role, bacouse laravel would think that our joining table is called role_user (Becouse alphabeticly role is first)
    public function users(){
    return $this->belongsToMany('App\Models\User', 'user_role');   
    }
}
