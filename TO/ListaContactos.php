<?php

class ListaContactos{
	private $idUsuario;
	private $idContacto;
	private $rutaFotografia;
	private $email;
	private $telefono;
	private $idEstado;

	function __construct(){}

	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getIdContacto(){
		return $this->idContacto;
	}

	function getRutaFotografia(){
		return $this->rutaFotografia;
	}

	function getEmail(){
		return $this->email;
	}

	function getTelefono(){
		return $this->telefono;
	}
	function getidEstado(){
		return $this->idEstado;
	}


	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	function setIdContacto($idContacto){
		$this->idContacto = $idContacto;
	}

	function setRutaFotografia($rutaFotografia){
		$this->rutaFotografia = $rutaFotografia;
	}

	function setEmail($email){
		$this->email = $email;
	}

	function setTelefono($telefono){
		$this->telefono = $telefono;
	}
	function setIdEstado($idEstado){
		$this->idEstado = $idEstado;
	}

}
?>