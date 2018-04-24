		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_clientes.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	
		
			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("Realmente deseas eliminar el cliente")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_clientes.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
		
		
	
$( "#guardar_cliente" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_cliente" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$("#cboDepartamento").change(function(){
  	var departamento = $("#cboDepartamento").val()+"0000";
	$("#cboProvincia").empty();	
	$.post('../facturacion/inei.php',  { departamento: departamento },  function(data, status, jqXHR) {

			//alert(data);
			var i = 0;
			var id;
			var nombre;
			$.each(JSON.parse(data), function(key, value) {		  	
		    	if(i==0)
		    	{
		       		 id = value.toString().split(',');
				}
				if(i==1)
				{
					 nombre = value.toString().split(',');
				}
				if(i==2)
				{
					 region_id = value.toString().split(',');
				}
			i++;
			}); 

			for (var i=0; i<id.length; i++) {
			$("#cboProvincia").append('<option value="' + region_id[i] +'-'+id[i]+ '">' + nombre[i] + '</option>');
		    }

    })

})

$("#cboProvincia").change(function(){
	  var provincia = $("#cboProvincia").val();
	 	  
	$("#cboDistrito").empty();	
	$.post('../facturacion/inei.php',  { provincia: provincia },  function(data, status, jqXHR) {
			
			var i = 0;
			var id;
			var nombre;
			$.each(JSON.parse(data), function(key, value) {
		  	
		    	if(i==0)
		    	{
		       		 id = value.toString().split(',');
				}
				if(i==1)
				{
					 nombre = value.toString().split(',');
				}
			i++;
			}); 

			for (var i=0; i<id.length; i++) {
			$("#cboDistrito").append('<option value="' + id[i] + '">' + nombre[i] + '</option>');
		    }

    })

})

				
	function obtener_datos(id){
			var nombre_cliente = $("#nombre_cliente"+id).val();
			var telefono_cliente = $("#telefono_cliente"+id).val();
			var email_cliente = $("#email_cliente"+id).val();
			var direccion_cliente = $("#direccion_cliente"+id).val();
			var status_cliente = $("#status_cliente"+id).val();
	
			$("#mod_nombre").val(nombre_cliente);
			$("#mod_telefono").val(telefono_cliente);
			$("#mod_email").val(email_cliente);
			$("#mod_direccion").val(direccion_cliente);
			$("#mod_estado").val(status_cliente);
			$("#mod_id").val(id);
		
		}
	
		
		

