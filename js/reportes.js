$("#datos_reporte").submit(function(){
		  var fecha_inicial = $("#fecha_inicial").val();
		  var fecha_final = $("#fecha_final").val();
		  var tipo_documento = $("#tipo_documento").val();		 
		
		 VentanaCentrada('./pdf/documentos/reporte_pdf.php?fecha_inicial='+fecha_inicial+'&fecha_final='+fecha_final+'&tipo_documento='+tipo_documento,'Reporte','','1024','768','true');
});

		

