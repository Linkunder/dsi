<?php
include_once('../Persistencia/DAOGrafico.php');

class controlGraficos{

	private static $instancia;
	private $persistenciaGrafico;

	private function __construct(){
		$this->persistenciaGrafico = new DAOGrafico();
	}
	public function obtenerInstancia(){
		if (!isset(self::$instancia)){
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	public function cantidadHombres(){
		$vectorData =$this->persistenciaGrafico->cantidadHombres();
		return $vectorData;
	}
	public function cantidadMujeres(){
		$vectorData = $this->persistenciaGrafico->cantidadMujeres();
		return $vectorData;
	}

	public function edadJugadores(){
		$vectorData = $this->persistenciaGrafico->edadJugadores();
		return $vectorData;
	}
	public function recintosSuperficie(){
		$vectorData = $this->persistenciaGrafico->recintosSuperficie();
		return $vectorData;
	}
	public function recintosPrecio(){
		$vectorData = $this->persistenciaGrafico->recintosPrecio();
		return $vectorData;
	}

	public function recintosPartido(){
		$vectorData = $this->persistenciaGrafico->recintosPartido();
		return $vectorData;
	}
	public function recintosComentario(){
		$vectorData = $this->persistenciaGrafico->recintosComentario();
		return $vectorData;
	}
	public function jugadoresComentario(){
		$vectorData = $this->persistenciaGrafico->jugadoresComentario();
		return $vectorData;
	}
	public function partidosHora(){
		$vectorData = $this->persistenciaGrafico->partidosHora();
		return $vectorData;
	}
	public function partidosEstado(){
		$vectorData = $this->persistenciaGrafico->partidosEstado();
		return $vectorData;
	}
		public function jugadoresCapitan(){
		$vectorData = $this->persistenciaGrafico->jugadoresCapitan();
		return $vectorData;
	}
			public function jugadores(){
		$vectorData = $this->persistenciaGrafico->jugadores();
		return $vectorData;
	}

}
?>