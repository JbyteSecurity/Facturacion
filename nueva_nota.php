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
	$active_nota="active";
	$active_facturas="";
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Nueva Nota de Crédito | Simple Invoice";
	
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
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Nota de Crédito</h4>
		</div>
		<div class="panel-body">
		<?php 
			include("modal/buscar_productos.php");
			include("modal/registro_clientes.php");
			include("modal/registro_productos.php");
		?>
			<form class="form-horizontal" role="form" id="datos_nota">
				<div class="form-group row">

				  <label for="nombre_cliente" class="col-md-3 control-label">Tipo de Nota de Crédito</label>
				  <div class="col-md-3">
					  <select class="form-control input-sm" id="tipo_nota">
					  	<option value="ANULACION DE LA OPERACION">Anulación de la Operación</option>
					  	<option value="ANULACION POR ERROR EN EL RUC">Anulación por Erro en el RUC</option>
					  	<option value="DESCUENTO GLOBAL">Descuento Global</option>
					  	<option value="DEVULUCION TOTAL">Devolución Total</option>
					  	<option value="CORRECCION POR ERRO EN LA DESCRIPCION">Correción por error en la descripción</option>
					  	<option value="DEVULUCION POR ITEM">Devolución por item</option>
					  	<option value="DESCUENTO POR ITEM">Descuento por item</option>
					  </select>

				  </div>

				</div>

				<div class="form-group row">
				  <label for="ruc1" class="col-md-3 control-label">Número de FE respecto de la cual se emitirá la Nota de Crédito</label>
							<div class="col-md-2">
								<select class="form-control input-sm" id="serie">
								<option value="F01">E001</option>
								<option value="B01">EB001</option>							
					  	</select>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="numero_factura" placeholder="numero factura o boleta">
							</div>
				
				 </div>
						<div class="form-group row">
							<label for="empresa" class="col-md-3 control-label">Motivo o sustento por el cual se emitirá la Nota de Credito</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="motivo" placeholder="motivo">
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
	<script type="text/javascript" src="js/nueva_nota.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  </body>
</html>