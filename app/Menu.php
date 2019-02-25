<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['title','description','type','status','status','user_id','image'];

     public function user(){
		return $this->belongsTo('app\User');        
    }

}
