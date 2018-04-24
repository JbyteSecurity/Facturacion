<?php

include("config/db.php");
include("config/conexion.php");
	
$conn = $con;
$departamento = $_POST['departamento'];
$distrito = $_POST['distrito'];

if($departamento != "")
  {
      getProvincia($departamento, $conn);		

  } 
if($distrito != "")
  {
      getDistrito($distrito, $conn);		

  } 




function getProvincia($departamento, $conn)
{
	$id= array();
	$nombre = array();
	$provincia = array();
	$sql=mysqli_query($conn, "SELECT id, name FROM provinces WHERE region_id='".$departamento."'");
	$i = 0;
	while ($row=mysqli_fetch_array($sql))
	{
			$id[$i]=utf8_encode($row["id"]);
 			$nombre[$i] = utf8_encode( $row["name"]);
		    $i++;		
	}

	$provincia["id"] = $id;
	$provincia["nombre"]= $nombre;

//	$out = array_values($id);
	print json_encode($provincia);
}

 
function getDistrito($distrito, $conn)
{
	$id= array();
	$nombre = array();
	$distrito = array();
	$sql=mysqli_query($conn, "SELECT id, name FROM districts WHERE province_id='".$distrito."'");
	$i = 0;
	while ($row=mysqli_fetch_array($sql))
	{
			$id[$i]=utf8_encode($row["id"]);
 			$nombre[$i] = utf8_encode( $row["name"]);
		    $i++;		
	}

	$distrito["id"] = $id;
	$distrito["nombre"]= $nombre;

//	$out = array_values($id);
	print json_encode($provincia);
}

?>
