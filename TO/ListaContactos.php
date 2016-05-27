<?php

class ListaContactos{
	private $idUsuario;
	private $idContacto;

	function __construct(){}

	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getIdContacto(){
		return $this->idContacto;
	}


	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	function setIdContacto($idContacto){
		$this->idContacto = $idContacto;
	}

}
?>