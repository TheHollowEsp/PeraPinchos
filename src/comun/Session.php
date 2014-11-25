<?php
/**
 * Clase que encapsula el manejo de sesion
 * @author Miguel Callon
 */
class Session {
	public static function iniciarSesion() {
		 session_start();
	}
	
	public static function set($id, $valor) {
		$_SESSION[$id] = $valor;
	}
	
	/**
	 * Metodo que devuelve una propiedad de la sesion
	 */
	public static function get($id) {
		return isset($_SESSION[$id])?$_SESSION[$id]:"";	
	}
}
?>