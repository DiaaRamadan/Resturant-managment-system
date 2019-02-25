<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title','description','type','status','user_id','image','menu_id','price'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function menu(){
    	return $this->belongsTo(Menu::class);
    }
}
