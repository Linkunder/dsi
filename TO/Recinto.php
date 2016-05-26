<?php

class Recinto{
	private $idRecinto;
	private $nombre;
	private $tipo;
	private $superficie;
	private $precio;
	private $direccion;
	private $horario;
	private $rutaFotografia;
	private $linkMapa;
	private $cantidadCanchas;
	private $puntuacion;
	private $telefono;
	private $idEstado;

	function __construct(){}

	function getIdRecinto(){
		return $this->idRecinto;
	}

	function getNombre(){
		return $this->nombre;
	}

	function getTipo(){
		return $this->tipo;
	}

	function getSuperficie(){
		return $this->superficie;
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

	function getPuntuacion(){
		return $this->puntuacion;
	}

	function getTelefono(){
		return $this->telefono;
	}

	function getIdEstado(){
		return $this->idEstado;
	}

	function setIdRecinto($idRecinto){
		$this->idRecinto = $idRecinto;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function setTipo($tipo){
		$this->tipo = $tipo;
	}

	function setSuperficie($superficie){
		$this->superficie = $superficie;
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

	function setPuntuacion($puntuacion){
		$this->puntuacion = $puntuacion;
	}

	function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	function setIdEstado($idEstado){
		$this->idEstado = $idEstado;
	}
}
?>