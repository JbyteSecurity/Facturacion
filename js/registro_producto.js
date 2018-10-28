$(document).ready(function() {
    console.log('dentro de un segundo document.ready');
    var codigo = $("#codigo");			
	codigo.focusout(function (event){
		codigo_servicio = $("#codigo").val();
		var url = './ajax/buscar_servicio.php?codigo_servicio='+codigo_servicio;
	    console.log(url);
		$.get(url,function(data){ 
			data = JSON.parse(data);
			$("#cantidad").val("1");
			var area = document.getElementById ("nombre_producto");
			area.value = data[0];
			var precio = document.getElementById ("precio");
			precio.value = data[1];
		});
	});
 });

