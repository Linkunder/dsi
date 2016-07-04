<?php

class Usuario{
	private $idUsuario;
	private $nombre;
	private $apellido;
	private $nickname;
	private $email;
	private $password;
	private $fechaNacimiento;
	private $sexo;
	private $rutaFotografia;
	private $telefono;
	private $idEstado;
	private $idPerfil;

	function __construct(){}

	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getApellido(){
		return $this->apellido;
	}

	function getPassword(){
		return $this->password;
	}

	function getNickname(){
		return $this->nickname;
	}

	function getEmail(){
		return $this->email;
	}

	function getFechaNacimiento(){
		return $this->fechaNacimiento;
	}

	function getSexo(){
		return $this->sexo;
	}

	function getRutaFotografia(){
		return $this->rutaFotografia;
	}

	function getTelefono(){
		return $this->telefono;
	}

	function getIdEstado(){
		return $this->idEstado;
	}

	function getIdPerfil(){
		return $this->idPerfil;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setApellido($apellido){
		$this->apellido = $apellido;
	}

	function setNickname($nickname){
		$this->nickname = $nickname;
	}

	function setEmail($email){
		$this->email = $email;
	}

	function setFechaNacimiento($fechaNacimiento){
		$this->fechaNacimiento = $fechaNacimiento;
	}

	function setSexo($sexo){
		$this->sexo = $sexo;
	}

	function setPassword($password){
		$this->password = $password;
	}

	function setRutaFotografia($rutaFotografia){
		$this->rutaFotografia = $rutaFotografia;
	}

	function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	function setIdEstado($idEstado){
		$this->idEstado = $idEstado;
	}

	function setIdPerfil($idPerfil){
		$this->idPerfil = $idPerfil;
	}

}
?>