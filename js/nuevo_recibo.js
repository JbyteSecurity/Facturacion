
		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/productos_recibo.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	function agregar (id)
		{
			var precio_venta=document.getElementById('precio_venta_'+id).value;
			var cantidad=document.getElementById('cantidad_'+id).value;
			//Inicia validacion
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad_'+id).focus();
			return false;
			}
			if (isNaN(precio_venta))
			{
			alert('Esto no es un numero');
			document.getElementById('precio_venta_'+id).focus();
			return false;
			}
			//Fin validacion
			
			$.ajax({
        type: "POST",
        url: "./ajax/agregar_recibos.php",
        data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});
		}
		function agregarmas (id)
		{
			var precio_venta=document.getElementById('precio').value;
			var cantidad=document.getElementById('cantidad').value;
			//Inicia validacion
			if (isNaN(cantidad))
			{
			alert('Esto no es un numero');
			document.getElementById('cantidad').focus();
			return false;
			}
			if (isNaN(precio_venta))
			{
			alert('Esto no es un numero');
			document.getElementById('precio_venta').focus();
			return false;
			}
			//Fin validacion
			
			$.ajax({
        type: "POST",
        url: "./ajax/agregar_recibos.php",
        data: "id="+id+"&precio_venta="+precio_venta+"&cantidad="+cantidad,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});
		}
			function eliminar (id)
		{
			
			$.ajax({
        type: "GET",
        url: "./ajax/agregar_recibos.php",
        data: "id="+id,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		}
			});

		}
		
		$("#datos_recibo").submit(function(){
		  var id_cliente = $("#id_cliente").val();
		  var id_vendedor = $("#id_vendedor").val();
		  var condiciones = $("#condiciones").val();
		  var kardex = $("#kardex").val();		  
		  if (id_cliente==""){
			  alert("Debes seleccionar un cliente");
			  $("#nombre_cliente").focus();
			  return false;
		  }
		 VentanaCentrada('./pdf/documentos/recibo_pdf.php?id_cliente='+id_cliente+'&id_vendedor='+id_vendedor+'&condiciones='+condiciones+'&kardex='+kardex,'recibo','','1024','768','true');
	 	});
		
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
		
		$( "#guardar_producto" ).submit(function( event ) {
		  $('#guardar_datos').attr("disabled", true);
		  
		 var parametros = $(this).serialize();
			 $.ajax({
					type: "POST",
					url: "ajax/nuevo_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados_ajax_productos").html("Mensaje: Cargando...");
					  },
					success: function(datos){
					$("#resultados_ajax_productos").html(datos);
					$('#guardar_datos').attr("disabled", false);
					load(1);
				  }
			});
		  event.preventDefault();
		})
$("#cboDepartamento").change(function(){
  	var departamento = $("#cboDepartamento").val()+"0000";
	$("#cboProvincia").empty();	
	$("#cboProvincia").append('<option value="0">TODOS</option>');
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
$("#cboDepartamento2").change(function(){
	
	var departamento = $("#cboDepartamento2").val()+"0000";
	$("#cboProvincia2").empty();	
	$("#cboProvincia2").append('<option value="0">TODOS</option>');
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
			$("#cboProvincia2").append('<option value="' + region_id[i] +'-'+id[i]+ '">' + nombre[i] + '</option>');
			}
  
	})
  
  })
  
$("#cboProvincia2").click(function(){
	
  var departamento = $("#cboDepartamento2").val()+"0000";
  //$("#cboProvincia2").empty();	
  //$("#cboProvincia2").append('<option value="0">TODOS</option>');
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
		  $("#cboProvincia2").append('<option value="' + region_id[i] +'-'+id[i]+ '">' + nombre[i] + '</option>');
		  }

  })

})

$("#cboProvincia").change(function(){
	  var provincia = $("#cboProvincia").val();
	 	  
	$("#cboDistrito").empty();	
	$("#cboDistrito").append('<option value="0">TODOS</option>');
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

$("#cboProvincia2").change(function(){
	var provincia = $("#cboProvincia2").val();
		 
  $("#cboDistrito2").empty();	
  $("#cboDistrito2").append('<option value="0">TODOS</option>');
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
		  $("#cboDistrito2").append('<option value="' + id[i] + '">' + nombre[i] + '</option>');
		  }

  })

})

$("#cboDistrito2").click(function(){
	var provincia = $("#cboProvincia2").val();
		 
  //$("#cboDistrito2").empty();	
  //$("#cboDistrito2").append('<option value="0">TODOS</option>');
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
		  $("#cboDistrito2").append('<option value="' + id[i] + '">' + nombre[i] + '</option>');
		  }

  })

})