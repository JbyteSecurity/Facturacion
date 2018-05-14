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
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$numero_nota=intval($_GET['id']);
		$del1="delete from nota where numero_nota='".$numero_nota."'";
		
		if ($delete1=mysqli_query($con,$del1)){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puedo eliminar los datos
			</div>
			<?php
			
		}
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $sTable = "nota";
		 $sWhere = "";

		if ( $_GET['q'] != "" )
		{
		$sWhere.= " where  numero_nota like '%$q%'";
			
		}
		
		$sWhere.=" order by id_nota desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		//echo "SELECT count(*) AS numrows FROM $sTable  $sWhere";
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		//echo $numrows;
		$total_pages = ceil($numrows/$per_page);
		$reload = './nota.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>#</th>
					<th>Fecha</th>
					<th>Nota</th>
					<th>Factura</th>
					<th>Tipo Nota</th>
					<th>Motivo</th>					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_nota=$row['id_nota'];
						$numero_nota=$row['numero_nota'];
                        $fecha=date("d/m/Y", strtotime($row['fecha_nota']));
                        $tipo_nota=$row['tipo_nota'];
						$numero_factura=$row['numero_factura'];
						$motivo=$row['motivo'];
						
					?>
					<tr>
						<td><?php echo $numero_nota; ?></td>
						<td><?php echo $fecha; ?></td>		
						<td><?php echo $numero_nota; ?></td>
						<td><?php echo $numero_factura; ?></td>	
						<td><?php echo $tipo_nota; ?></td>
						<td><?php echo $motivo; ?></td>					


					<td class="text-right">
					<!--<a href="editar_nota.php?id_nota=<?php echo $id_nota;?>" class='btn btn-default' title='Editar nota' ><i class="glyphicon glyphicon-edit"></i></a> --> 
						<a href="#" class='btn btn-default' title='Descargar nota de credito' onclick="imprimir_nota('<?php echo $id_nota;?>');"><i class="glyphicon glyphicon-download"></i></a> 
					<!--<a href="#" class='btn btn-default' title='Borrar nota de credito' onclick="eliminar('<?php echo $numero_factura; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>-->
					</td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>