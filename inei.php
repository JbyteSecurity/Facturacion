<?php

include("config/db.php");
include("config/conexion.php");
	
$conn = $con;
$departamento = "";
$provincia = "";
$cliente = "";
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
if(!empty($_POST['id']))
  {
			$cliente = $_POST['id'];
			getUbigeo($cliente, $conn);
  }
function getUbigeo($cliente, $conn)
{
	$departamento_id = "";
	$provincia_id = "";
	$ubigeo_id = "";
	$departamento = "";
	$provincia = "";
	$ubigeo = "";
	
  $dataset = (object) array();                                  
	$dataset->msj = '';   
	$dataset->error = 0;


	$sql=mysqli_query($conn, "SELECT departamento, provincia, ubigeo FROM clientes WHERE id_cliente='".$cliente."'");
  while ($row=mysqli_fetch_array($sql))
	{
			$departamento_id=utf8_encode($row["departamento"]);
			$dataset->departamento_id = $departamento_id;
			$provincia_id = utf8_encode( $row["provincia"]);
			$dataset->provincia_id = $provincia_id;
			$ubigeo_id = utf8_encode( $row["ubigeo"]);
			$dataset->ubigeo_id = $ubigeo_id;
				
	}
	$sql2=mysqli_query($conn, "SELECT name FROM regions WHERE id='".$departamento_id."'");
  while ($row2=mysqli_fetch_array($sql2))
	{
			$departamento=utf8_encode($row2["name"]);
			$dataset->departamento = $departamento;
 						
	}
	$sql3=mysqli_query($conn, "SELECT name FROM provinces WHERE id='".$provincia_id."'");
  while ($row3=mysqli_fetch_array($sql3))
	{
			$provincia=utf8_encode($row3["name"]);
			$dataset->provincia = $provincia;
 						
	}
	$sql4=mysqli_query($conn, "SELECT name FROM districts WHERE id='".$ubigeo_id."'");
  while ($row4=mysqli_fetch_array($sql4))
	{
			$ubigeo=utf8_encode($row4["name"]);
			$dataset->ubigeo = $ubigeo;
 						
	}
	print json_encode($dataset);

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
