<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','role_id','is_active', 'email', 'password','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    public function CheckRole(){

       return $this->role->name;


    }
    public function post(){
        return $this->hasMany('App\Post');
    }
    public function getGravatarAttribute(){
        $hash = md5(strtolower(trim($this->attribute['email']))) . "?=mm";
        return "http://www.gravatar.com/avatar/$hash";
    }
     
}
