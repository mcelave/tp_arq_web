<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {
	//Esto no esta siendo usado




	public function __construct($id, $contenido){	
		$this->id = $id;
		$this->contenido = $contenido;
	}
}
