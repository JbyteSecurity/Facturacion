<?php

	/*-------------------------
	Autor: Jordan Diaz
	Web: 
	Mail: jordandiaz2016@gmail.com
	---------------------------*/
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	
	if(isset($_GET['codigo_servicio'])){
		$codigo_servicio = $_GET['codigo_servicio'];	
		$query   = mysqli_query($con, "SELECT nombre FROM servicios where codigo_servicio='$codigo_servicio';");
		error_log("CODIGO: ".$codigo_servicio);
		$row= mysqli_fetch_array($query);
		$nombre = $row['nombre'];
		echo $nombre;

	}
?>
