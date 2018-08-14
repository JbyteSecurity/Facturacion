	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_nombre" name="mod_nombre"  required>
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>
			   <div class="form-group">
				<label for="mod_telefono" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_telefono" name="mod_telefono">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="mod_email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				 <input type="email" class="form-control" id="mod_email" name="mod_email">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
				  <textarea class="form-control" id="mod_direccion" name="mod_direccion" ></textarea>
				</div>
			  </div>
				<div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Departamento:</label>
				<div class="col-sm-8">

				<select class="form-control" name="select4" id="cboDepartamento2">
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

				<select class="form-control" name="select5" id="cboProvincia2">			
        </select> 
				</div>
			  </div>
			  
			   <div class="form-group">
				<label for="Distrito" class="col-sm-3 control-label">Distrito:</label>
				<div class="col-sm-8">

				<select class="form-control" name="select6" id="cboDistrito2">
        </select> 
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select class="form-control" id="mod_estado" name="mod_estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
			 
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>