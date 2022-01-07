<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //belongToMany = Indicated manytomany relationships
    //User belong to many roles
    //this function creates a dynamic property, roles, inside the user object
    //app/model/role refers to the file location
    //After that i myst wrote user_role, bacouse laravel would think that our joining table is called role_user (Becouse alphabeticly role is first)
    public function roles(){
        return $this->belongsToMany('App\Models\Role', 'user_role');
    }

    //talking in roles and if it is an array run hassAnyRole
    //if it is not an array go to hasRole
    //This function will not abort if a user has been assigned many roles 
    public function authorizeRoles($roles){
        if(is_array($roles)){
            return $this->hasAnyRole($roles);
        }
        return $this->hasRole($roles);
    }
    //Checks If it has any roles 
    //THis function returnes true if the users role is either a user or an admin
    //WhereIn checks the list of user roles in $roles 
    public function hasAnyRole($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    //Checking if the user has an admin role 
    //This function will always return true or false
    public function hasRole($role){
        //Checking this user role and retreving it where name is the same as what is passed in the params
        //Where expects a string
        return null !== $this->roles()->where('name', $role)->first();
    }
    
}
