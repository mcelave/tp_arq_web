<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {    
	private $nombre;
	private $id;

	public function __construct($nombre, $id){	
		$this->nombre = $nombre;
		$this->id = $id;
	}

	public function mensajes(){
		return $this->hasMany(Mensaje::class);
	}
}
