<?php

class Solicitud{
	private $idSolicitud;
	private $nombre;
	private $precio;
	private $direccion;
	private $horario;
	private $rutaImagen;
	private $linkMapa;
	private $cantidadCanchas;
	private $superficie;
	private $telefono;
	private $idUsuario;

	function __construct(){}

	function getIdSolicitud(){
		return $this->idSolicitud;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getPrecio(){
		return $this->precio;
	}

	function getDireccion(){
		return $this->direccion;
	}

	function getHorario(){
		return $this->horario;
	}

	function getRutaFotografia(){
		return $this->rutaFotografia;
	}

	function getLinkMapa(){
		return $this->linkMapa;
	}

	function getCantidadCanchas(){
		return $this->cantidadCanchas;
	}

	function getSuperficie(){
		return $this->superficie;
	}

	function getTelefono(){
		return $this->telefono;
	}

	function getIdUsuario(){
		return $this->idUsuario;
	}

	function setIdSolicitud($idSolicitud){
		$this->idSolicitud = $idSolicitud;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setPrecio($precio){
		$this->precio = $precio;
	}

	function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	function setHorario($horario){
		$this->horario = $horario;
	}

	function setRutaFotografia($rutaFotografia){
		$this->rutaFotografia = $rutaFotografia;
	}

	function setLinkMapa($linkMapa){
		$this->linkMapa = $linkMapa;
	}

	function setCantidadCanchas($cantidadCanchas){
		$this->cantidadCanchas = $cantidadCanchas;
	}

	function setSuperficie($superficie){
		$this->superficie = $superficie;
	}

	function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
}
?>