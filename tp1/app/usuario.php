<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model {
    
    $nombre;


   public function mensajes(){
  		return $this->hasMany(mensaje::class);
	}
	
	
}
