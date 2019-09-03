<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function photo()
    {

        return $this->belongsTo('App\Photo');

    }

//    public function setPasswordAttribute($password){
//
//        if(!empty($password)){
//
//            $this->attributes['password'] = bcrypt($password);
//
//        }
//
//    }

    public function isAdmin()
    {

        if ($this->role['name'] == "administrator" && $this->is_active == 1) {

            return true;

        }

        Session::flash('not_admin', ' Access denied. You are not an active admin');
        return false;

    }

    public function posts()
    {

        return $this->hasMany('App\Post');

    }

    public function getGravatarAttribute(){

        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar$hash";

    }


}
