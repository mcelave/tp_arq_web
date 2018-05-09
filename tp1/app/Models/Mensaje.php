<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {
	//Esto no esta siendo usado
	private $id;
	private $contenido;

	public function __construct($id, $contenido){	
		$this->id = $id;
		$this->contenido = $contenido;
	}
}
