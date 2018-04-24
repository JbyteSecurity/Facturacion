<?php

include("config/db.php");
include("config/conexion.php");
	
$conn = $con;
$departamento = "";
$provincia = "";
if(!empty($_POST['provincia']))
  {
	$provincia = $_POST['provincia'];
  }
if(!empty($_POST['departamento']))
  {
	$departamento = $_POST['departamento'];
  }

if($departamento != "" and empty($_POST['provincia']))
  {
      getProvincia($departamento, $conn);		

  } 
if($provincia != "")
  {
      getDistrito($provincia, $conn);		

  } 

function getProvincia($departamento, $conn)
{
	$id= array();
	$nombre = array();
	$provincia = array();
	$region_id = array();
	$sql=mysqli_query($conn, "SELECT id, name, region_id FROM provinces WHERE region_id='".$departamento."'");
	$i = 0;
	while ($row=mysqli_fetch_array($sql))
	{
			$id[$i]=utf8_encode($row["id"]);
 			$nombre[$i] = utf8_encode( $row["name"]);
			$region_id[$i] = utf8_encode( $row["region_id"]);
			 $i++;		
	}

	$provincia["id"] = $id;
	$provincia["nombre"]= $nombre;
	$provincia["region_id"]= $region_id;

//	$out = array_values($id);
	print json_encode($provincia);
}

 
function getDistrito($provincia, $conn)
{
	$parametros = explode("-",$provincia);
	$id= array();
	$nombre = array();
	$distrito = array();
	$consulta = "SELECT id, name FROM districts WHERE province_id='".$parametros[0]."' and region_id='".$parametros[1]."'";
	$sql=mysqli_query($conn, $consulta);
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
	print json_encode($distrito);
}

?>
