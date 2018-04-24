	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">
			<div id="resultados_ajax"></div>
		   	<div class="form-group">
				<label for="ruc" class="col-sm-3 control-label">RUC</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="ruc" name="ruc" required>
				</div>
			  </div>
				<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombre" name="nombre" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="telefono" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telefono" name="telefono" >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" name="email" >
				  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="direccion" name="direccion"   maxlength="255" ></textarea>
				  
				</div>
			  </div>

			  <div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Departamento:</label>
				<div class="col-sm-8">

				<select class="form-control" name="select4" id="cboDepartamento">
      		<option value="">TODOS</option>
    			<option value="01">Amazonas</option>
					<option value="02">Áncash</option>
					<option value="03">Apurímac</option>
					<option value="04">Arequipa</option>
					<option value="05">Ayacucho</option>
					<option value="06">Cajamarca</option>
					<option value="07">Callao</option>
					<option value="08">Cusco</option>
					<option value="09">Huancavelica</option>
					<option value="10">Huánuco</option>
					<option value="11">Ica</option>
					<option value="12">Junín</option>
					<option value="13">La Libertad</option>
					<option value="14">Lambayeque</option>
					<option value="15">Lima</option>
					<option value="16">Loreto</option>
					<option value="17">Madre de Dios</option>
					<option value="18">Moquegua</option>
					<option value="19">Pasco</option>
					<option value="20">Piura</option>
					<option value="21">Puno</option>
					<option value="22">San Martín</option>
					<option value="23">Tacna</option>
					<option value="24">Tumbes</option>
   				<option value="25">Ucayali</option>
        		</select> 
				</div>
			  </div>


 			  <div class="form-group">
				<label for="Provincia" class="col-sm-3 control-label">Provincia:</label>
				<div class="col-sm-8">

				<select class="form-control" name="select5" id="cboProvincia">			
        </select> 
				</div>
			  </div>
			  
			   <div class="form-group">
				<label for="Distrito" class="col-sm-3 control-label">Distrito:</label>
				<div class="col-sm-8">

				<select class="form-control" name="select6" id="cboDistrito">
        </select> 
				</div>
			  </div>
			  

			  
			  <div class="form-group">
				<label for="estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="estado" name="estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
			 
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
