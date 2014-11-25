<?php
	/**
	 * Definimos el path de los ficheros php del sistema.
	 * @author Miguel Callon
	 */
	//Definimos las rutas que vamos a utilizar en el plugin, en este caso seguimos un patrón MVC
	define( 'APP_PATH',        PATH . '' );
	define( 'HTML_PATH', APP_PATH . '/html' );
	define( 'HTML_PUBLICA_PATH', HTML_PATH . '/publica' );
	define( 'HTML_PUBLICA_SUBASTAS_PATH', HTML_PUBLICA_PATH . '/subastas' );
	define( 'HTML_PRIVADA_PATH', HTML_PATH . '/privada' );
	define( 'HTML_PRIVADA_SUBASTAS_PATH', HTML_PRIVADA_PATH . '/subastas' );
	define( 'HTML_PRIVADA_PEDIDOS_PATH', HTML_PRIVADA_PATH . '/pedidos' );		//santi
	define( 'HTML_PRIVADA_COMUN_PATH', HTML_PRIVADA_PATH . '/comun' );		//santi
	define( 'HTML_PRIVADA_COMPONENTES_PATH', HTML_PRIVADA_PATH . '/componentes' );
	define( 'HTML_PRIVADA_CARRITO_PATH', HTML_PRIVADA_PATH . '/carrito' ); // Hector
	define( 'HTML_PRIVADA_USUARIOS_PATH', HTML_PRIVADA_PATH . '/usuarios' );
	define( 'HTML_PRIVADA_NOTIFICACIONES_PATH', HTML_PRIVADA_PATH . '/notificaciones' );
	define( 'HTML_ADMIN_PATH', HTML_PATH . '/admin' );
	define( 'HTML_ADMIN_SUBASTAS_PATH', HTML_ADMIN_PATH . '/subastas' );
	define( 'HTML_ADMIN_USUARIOS_PATH', HTML_ADMIN_PATH . '/usuarios' );
	define( 'HTML_ADMIN_PEDIDOS_PATH', HTML_ADMIN_PATH . '/pedidos' );		//santi
	define( 'HTML_ADMIN_COMPONENTES_PATH', HTML_ADMIN_PATH . '/componentes' );
	define( 'CONTROLLER_PATH', APP_PATH . '/controlador' );
	define( 'CONTROLLER_SUBASTAS_PATH', CONTROLLER_PATH . '/subastas' );
	define( 'CONTROLLER_PEDIDOS_PATH', CONTROLLER_PATH . '/pedidos' );
	define( 'CONTROLLER_COMUN_PATH', CONTROLLER_PATH . '/comun' );
	define( 'CONTROLLER_COMPONENTES_PATH', CONTROLLER_PATH . '/componentes' );
	define( 'CONTROLLER_USUARIOS_PATH', CONTROLLER_PATH . '/usuarios' );
	define( 'CONTROLLER_NOTIFICACIONES_PATH', CONTROLLER_PATH . '/notificaciones' );
	define( 'FACHADA_PATH',    APP_PATH . '/fachada' );
	define( 'DAO_PATH',        APP_PATH . '/dao' );
	define( 'BEAN_PATH',        APP_PATH . '/bean' );
	define( 'EXCEPCIONES_PATH',        APP_PATH . '/excepciones' );
	define( 'EXCEPCIONES_DAO_PATH',        EXCEPCIONES_PATH . '/dao' );
	define( 'EXCEPCIONES_FACHADA_PATH',        EXCEPCIONES_PATH . '/fachada' );
	define( 'EXCEPCIONES_CONTROLADOR_PATH',        EXCEPCIONES_PATH . '/controlador' );
	define( 'UTILES_PATH',        APP_PATH . '/utiles' );
	define( 'TEST_PATH',        APP_PATH . '/test' );
	define( 'PLUGIN_PATH',        APP_PATH . '/plugin' );
	define( 'PLUGIN_PAGAR_PATH',        PLUGIN_PATH . '/pagar' );
	define( 'PLUGIN_PAGAR_PAYPAL_PATH', PLUGIN_PAGAR_PATH . '/paypal' );
	define( 'PLUGIN_PROCESOS_PATH',        PLUGIN_PATH . '/procesos' );
	define( 'PLUGIN_PROCESOS_CRON_PATH', PLUGIN_PROCESOS_PATH . '/cron' );
	define( 'PLUGIN_PROCESOS_SUBASTAS_PATH', PLUGIN_PROCESOS_PATH . '/subastas' );
	
	function autoload( $className ) {
	 // Convert class name to filename format.
	 //$class_name = strtolower( $className );
	 $paths = array(
	   CONTROLLER_PATH,
	   CONTROLLER_SUBASTAS_PATH,
	   CONTROLLER_PEDIDOS_PATH,
	   CONTROLLER_COMUN_PATH,
	   CONTROLLER_COMPONENTES_PATH,
	   CONTROLLER_USUARIOS_PATH,
	   CONTROLLER_NOTIFICACIONES_PATH,
	   FACHADA_PATH,
	   DAO_PATH,
	   BEAN_PATH,
	   EXCEPCIONES_PATH,
	   EXCEPCIONES_DAO_PATH,
	   EXCEPCIONES_FACHADA_PATH,
	   EXCEPCIONES_CONTROLADOR_PATH,
	   UTILES_PATH,
	   TEST_PATH,
	   PLUGIN_PATH,
	   PLUGIN_PAGAR_PATH,
	   PLUGIN_PAGAR_PAYPAL_PATH,
	   PLUGIN_PROCESOS_PATH,
	   PLUGIN_PROCESOS_SUBASTAS_PATH,
	   PLUGIN_PROCESOS_CRON_PATH
	 );
	 
	 // Buscamos en cada ruta los archivos
		foreach( $paths as $path ) {
			//echo "cargar: $path/$className.php";
			if( file_exists( "$path/$className.php" ) ) {
			   require_once( "$path/$className.php" );
			}
		}
	}
	spl_autoload_register( 'autoload' );
?>