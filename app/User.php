<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avtar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function uploadAvtar($image){
        $fileName = $image->getClientOriginalName();
        (new self())->deleteAvtar();
        $image->storeAs('images',$fileName,'public');
        auth()->user()->update(['avtar' => $fileName]);
    }

    public function todo(){
        return $this->hasMany(Todo::class);
    }

    public function deleteAvtar(){

        if($this->avtar){
            Storage::delete('/public/images/'.$this->avtar);
        }
        // if(auth()->user()->avtar){
        //     Storage::delete('/public/images/'.auth()->user()->avtar);
        // }
    }
    // public function setPasswordAttribute($password){
    //     return $this->attributes['password'] = bcrypt($password);
    // }

    // public function getNameAttribute($name){
    //     return 'May Name is'.ucfirst($name);
    // }
}
