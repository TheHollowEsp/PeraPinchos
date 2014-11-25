<?php
	/**
	 * Constantes del programa.
	 * @author Miguel Callon
	 */
	// Se utiliza para consultar en la sesion si el usuario conectado
	// esta autenticado
	define( 'IS_AUTENTICADO_KEY',  'IS_AUTENTICADO_KEY');
	// Para consultar en la sesion si el usuario conectado es 
	// administrador
	define( 'IS_ADMIN_KEY',  'IS_ADMIN_KEY');
	// Se utiliza para almacenar en la sesion el id usuario conectado
	define ('ID_USUARIO_CONECTADO_KEY', "ID_USUARIO_CONECTADO_KEY");
	// Se utiliza para almacenar los datos del usuario conectado
	define ('USUARIO_CONECTADO_KEY', "USUARIO_CONECTADO_KEY");
	 
	// MULTIIDIOMA
	// Para introducir en la sesion el LOCALE del idioma
	define( 'LOCALE_KEY', 'LOCALE_KEY');
	// Para almacenar en la sesion los textos de idiomas.
	define( 'MULTIIDIOMA_KEY', 'MULTIIDIOMA_KEY');
	// El LOCALE a utilizar en caso de no especificar ninguno
	define( 'LOCALE_DEFAULT', 'es_ES');
	 
	// CONEXION BD
	// Localizacion BD
	define( 'HOST_BD', 'localhost');
	// Nombre BD
	define( 'NOMBRE_BD', 'SubastasIU');
	// Usuario BD
	define( 'USUARIO_BD', 'userSubIu');
	// Clave BD
	define( 'CLAVE_BD', 'passSubIu');
	
	// Id de usuario administrador principal (INAMOVIBLE)
	// Nunca se debe permitir borrar este usuario
	define( 'ID_USUARIO_ADMIN_PRINCIPAL', 0);
	 
	// PAGINADOS
	// Numero de elementos por pagina.
	define('NUM_ELEM_PAG_DEFAULT', 10);
	// Numero de pagina actual
	define ('NUM_PAG_DEFAULT', 1);
	
	// BUSQUEDAS
	// Parametros de busqueda del listado de pedidos
	define ('BUSQUEDA_PEDIDOS_BEAN',"BUSQUEDA_PEDIDOS_BEAN");
	// Parametros de busqueda del listado de subastas
	define ('BUSQUEDA_SUBASTAS_BEAN',"BUSQUEDA_SUBASTAS_BEAN");
	// Parametros de busqueda del listado de componentes
	define ('BUSQUEDA_COMPONENTES_BEAN',"BUSQUEDA_COMPONENTES_BEAN");
	// Parametros de busqueda de usuarios
	define ('BUSQUEDA_USUARIOS_BEAN',"BUSQUEDA_USUARIOS_BEAN");
	// Parametros de busqueda de notificaciones
	define ('BUSQUEDA_NOTIFICACIONES_BEAN',"BUSQUEDA_NOTIFICACIONES_BEAN");
	
	// Carrito de la sesion
	define ('CARRITO_BEAN_KEY',"CARRITO_BEAN_KEY");
	
	// PAGO DE PEDIDOS
	// Indica que el tipo de envio es por defecto
	define ('TIPO_ENVIO_DEFAULT', 0);
	// Porcentaje que se lleva la plataforma
	define('PORCENTAJE_PLATAFORMA', 0.30);

	// REGISTRO DE USUARIO
	// Indica que el usuario podra hacer acciones comunes
	define('ES_USUARIO_NORMAL', 0);
	// Indica que el usuario podra hacer acciones con privilegios
	define('ES_USUARIO_ADMIN', 1);

	// ESTADO DE USUARIO
	// Usuario habilitado
	define('ESTADO_USUARIO_HABILITADO', 1);
	// Usuario dado de baja
	define('ESTADO_USUARIO_BAJA', 2);
	
	// COMPONENTE
	// ESTADOS DE COMPONENTES
	// Componente nuevo
	define('ESTADO_COMPONENTE_NUEVO', 1);
	// Componente usado
	define('ESTADO_COMPONENTE_USADO', 2);
	
	// PEDIDOS
	// ESTADOS DE PEDIDOS
	// Pedido nuevo
	define('ESTADO_PEDIDO_NUEVO', 1);
	// Pedido enviado
	define('ESTADO_PEDIDO_EN_TRAMITE', 2);
	// Pedido rechazado
	define('ESTADO_PEDIDO_RECHAZADO', 3);
	// Pedido aceptado
	define('ESTADO_PEDIDO_ACEPTADO', 4);
	// Pedido recibido
	define('ESTADO_PEDIDO_RECIBIDO', 5);
	// Pedido no recibido
	define('ESTADO_PEDIDO_NO_RECIBIDO', 6);
	
	// ESTADOS DE PUJA
	// Puja ganadora
	define('ESTADO_PUJA_GANADORA', 1);
	// Pedido nuevo
	define('ESTADO_PUJA_PERDEDORA', 2);
	
	// ESTADOS DE NOTIFICACION
	// Notificacion no leida
	define('ESTADO_NOTIFICACION_NO_LEIDO', 1);
	// Notificacion leida
	define('ESTADO_NOTIFICACION_LEIDO', 2);
	
	// ESTADOS DE SUBASTA
	// Subasta creada
	define('ESTADO_SUBASTA_CREADA', 1);
	// Subasta en proceso de subasta
	define('ESTADO_SUBASTA_EN_PROCESO', 2);
	// Subasta finalizada
	define('ESTADO_SUBASTA_FINALIZADA', 3);
	// Subasta cancelada
	define('ESTADO_SUBASTA_CANCELADA', 4);
	// Subasta abortada (cancelada por administrador)
	define('ESTADO_SUBASTA_ABORTADA', 5);
	
	// Motivo cierre propietario cancelado
	define('MOTIVO_CIERRE_PROPIETARIO_CANCELA', " EL PROPIETARIO HA CANCELADO");
	
	// TRANSACCIONES
	// Conceptos
	// Pago del comprador a la plataforma
	define('PAGO_COMPRADOR_PLATAFORMA', 1);
	// Pago de plataforma a vendedor
	define('PAGO_PLATAFORMA_VENDEDOR', 2);
	// Pago de vendedor a plataforma
	define('PAGO_VENDEDOR_PLATAFORMA', 3);
	
	// Indica el identificador del usuario administrador 
	// que representa a la plataforma.
	// Se utiliza tambien para registrar el pago a la plataforma
	define ('ID_USUARIO_ADMIN', 0);
	// Cuenta de paypal de la plataforma
	define ('CUENTA_PAYPAL_PLATAFORMA', '111111111111111111');
	
	// Tamano maximo de las fotos a subir
	define('MAX_FILE_SIZE', 40000000);
	// Codigos de error de $_FILE['mi_archivo']['error']
	// Fichero subido correctamente
	define('UPLOAD_OK', 0);
	// El archivo subido excede la directiva MAX_FILE_SIZE,
	// si se especifico en el formulario.
	define('ERROR_FICHERO_EXCEDE_TAMANO_PHPINI', 1);
	// El archivo subido excede la directiva MAX_FILE_SIZE,
	// si se especifico en el formulario
	define('ERROR_FICHERO_EXCEDE_TAMANO_FORM', 2);
	// El archivo subido fue solo parcialmente cargado.
	define('ERROR_FICHERO_PARCIALMENTE_UPLOAD', 3);
	// No se ha subido ningun archivo.
	define('ERROR_ARCHIVO_NO_SUBIDO', 4);
	// Falta el directorio de almacenamiento temporal.
	define('ERROR_FALTA_DIR_TEMPORAL', 6);
	// No se puede escribir el archivo (posible problema
	// relacionado con los permisos de escritura).
	define('ERROR_PROBLEMA_PERMISOS', 7);
	
	// PATHs de subida de ficheros
	define( 'UPLOAD_DIR', PATH . '/upload' );
	define( 'UPLOAD_FOTOS', UPLOAD_DIR . '/fotos' );
	// Rutas cuando se da de alta una subasta y un componente
	define( 'UPLOAD_FOTOS_SUBASTAS', '/subastas/' );
	define( 'UPLOAD_FOTOS_COMPONENTES', '/componentes/' );
	// Path de la imagen por defecto cuando no encuentra una imagen
	define( 'RUTA_IMAGEN_DEFAULT', PATH.'/recursos/img/nophoto.png');
	// Recursos publicos
	define( 'RUTA_RECURSOS_HTML_DIR', PATH . '/recursos' );
?>