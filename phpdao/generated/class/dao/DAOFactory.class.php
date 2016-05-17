<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return CategoriaDAO
	 */
	public static function getCategoriaDAO(){
		return new CategoriaMySqlExtDAO();
	}

	/**
	 * @return CategoriarecintoDAO
	 */
	public static function getCategoriarecintoDAO(){
		return new CategoriarecintoMySqlExtDAO();
	}

	/**
	 * @return ComentarioDAO
	 */
	public static function getComentarioDAO(){
		return new ComentarioMySqlExtDAO();
	}

	/**
	 * @return ElementodeportivoDAO
	 */
	public static function getElementodeportivoDAO(){
		return new ElementodeportivoMySqlExtDAO();
	}

	/**
	 * @return EquipoDAO
	 */
	public static function getEquipoDAO(){
		return new EquipoMySqlExtDAO();
	}

	/**
	 * @return EstadojugadorDAO
	 */
	public static function getEstadojugadorDAO(){
		return new EstadojugadorMySqlExtDAO();
	}

	/**
	 * @return EstadopartidoDAO
	 */
	public static function getEstadopartidoDAO(){
		return new EstadopartidoMySqlExtDAO();
	}

	/**
	 * @return EstadorecintoDAO
	 */
	public static function getEstadorecintoDAO(){
		return new EstadorecintoMySqlExtDAO();
	}

	/**
	 * @return ListadoelementosDAO
	 */
	public static function getListadoelementosDAO(){
		return new ListadoelementosMySqlExtDAO();
	}

	/**
	 * @return LocalDAO
	 */
	public static function getLocalDAO(){
		return new LocalMySqlExtDAO();
	}

	/**
	 * @return PartidoDAO
	 */
	public static function getPartidoDAO(){
		return new PartidoMySqlExtDAO();
	}

	/**
	 * @return PerfilDAO
	 */
	public static function getPerfilDAO(){
		return new PerfilMySqlExtDAO();
	}

	/**
	 * @return RecintoDAO
	 */
	public static function getRecintoDAO(){
		return new RecintoMySqlExtDAO();
	}

	/**
	 * @return SolicitudDAO
	 */
	public static function getSolicitudDAO(){
		return new SolicitudMySqlExtDAO();
	}

	/**
	 * @return TercertiempoDAO
	 */
	public static function getTercertiempoDAO(){
		return new TercertiempoMySqlExtDAO();
	}

	/**
	 * @return UsuarioDAO
	 */
	public static function getUsuarioDAO(){
		return new UsuarioMySqlExtDAO();
	}


}
?>