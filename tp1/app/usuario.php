<?php

namespace App;



use Illuminate\Database\Eloquent\Model;

class usuario extends Model {
    
    private $nombre;

    private $id;

 public function __construct($name, $id){
  		
  		$this->nombre = $name;
		$this->id = $id;
	}


   public function mensajes(){
  		return $this->hasMany(mensaje::class);
	}






	
	
}
