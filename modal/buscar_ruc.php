<?php

$url = "https://ruc.com.pe/api/v1/ruc";
$token = "054010fa-212d-4fa5-a6b9-11589c620dd7-47dcdbbb-a534-48c6-b0b9-63e7ed555e54";

$rucaconsultar = $_POST['ruc'];

$data = ("token|" . $token . "|\r\n". "ruc|". $rucaconsultar . "|\r\n");
	
// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => $data
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }


$leer_respuesta = $result;

// Mostramos la respuesta
// Cuidado con los saltos de linea

$datos = array();
$datos = explode("\r\n", $leer_respuesta);

$nombre = $datos[2];
$nombrecompleto = array();
$nombrecompleto = explode("|",$nombre);



print_r($nombrecompleto[1]);


