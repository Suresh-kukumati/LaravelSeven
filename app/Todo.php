<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title','user_id','completed'];

    //default is ID
    // public function getRouteKeyName(){
    //     return 'title';
    // }
}
