<?php

$ruta = "https://ruc.com.pe/api/v1/ruc";
$token = "054010fa-212d-4fa5-a6b9-11589c620dd7-47dcdbbb-a534-48c6-b0b9-63e7ed555e54";

$rucaconsultar = $_POST['ruc'];

$data = ("token|" . $token . "|\r\n". "ruc|". $rucaconsultar . "|\r\n");
	
$data_txt = $data;

// Invocamos el servicio a ruc.com.pe
// Ejemplo para TXT
// Cuidado con los saltos de linea
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ruta);
curl_setopt(
	$ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: text/plain',
	)
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_txt);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$respuesta  = curl_exec($ch);
curl_close($ch);

$leer_respuesta = $respuesta;

// Mostramos la respuesta
// Cuidado con los saltos de linea

$datos = array();
$datos = explode("\r\n", $leer_respuesta);

$nombre = $datos[2];
$nombrecompleto = array();
$nombrecompleto = explode("|",$nombre);



print_r($nombrecompleto[1]);
