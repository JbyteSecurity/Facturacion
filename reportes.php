<?php
	/*-------------------------
	Autor: Jordan Diaz
	Web: 
	Mail: jordandiaz2016@gmail.com
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
    $active_boletas="";
	$active_facturas="";
	$active_nota="";
	$active_productos="";
	$active_clientes="";
    $active_reportes="active";	
    $active_usuarios="";	
	$title="Imprimir Reportes | Simple Invoice";
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i>Imprimir Reporte</h4>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" id="datos_reporte">
				<div class="form-group row">
				  <label for="fecha_inicial" class="col-md-2 control-label">Fecha Inicial</label>
				  <div class="col-md-2">
					  <input type="text" class="form-control input-sm" id="fecha_inicial" placeholder="12/12/2018" required>					 
				  </div>
				  <label for="fecha_final" class="col-md-2 control-label">Fecha Final</label>
				  <div class="col-md-2">
                      <input type="text" class="form-control input-sm" id="fecha_final" placeholder="12/12/2018" required>					  
				  </div>
				  <label for="tipo_documento" class="col-md-2 control-label">Tipo de Documento</label>
							<div class="col-md-2">
                            <select class="selectpicker" id="tipo_documento">
                            <option value="Factura">Factura</option>
                            <option value="Boleta">Boleta</option>
                            <option value="Nota">Nota de Credito</option>
                            </select>
							</div>
				
				 </div>
					
				<div class="col-md-12">
					<div class="pull-right">					
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			
	

			
			</div>	
		 </div>
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/reportes.js"></script>	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  </body>
</html>
