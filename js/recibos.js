$(document).ready(function(){
    load(1);
    
});

function load(page){
    var q= $("#q").val();
    $("#loader").fadeIn('slow');    
    $.ajax({
        url:'./ajax/buscar_recibos.php?action=ajax&page='+page+'&q='+q,
         beforeSend: function(objeto){
         $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
      },
        success:function(data){
            $(".outer_div").html(data).fadeIn('slow');
            $('#loader').html('');
            $('[data-toggle="tooltip"]').tooltip({html:true}); 
            
        }
    })
}



    function eliminar (id)
{
    var q= $("#q").val();
if (confirm("Realmente deseas eliminar la recibo")){	
$.ajax({
type: "GET",
url: "./ajax/buscar_recibos.php",
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

function imprimir_recibo(id_recibo){
    VentanaCentrada('./pdf/documentos/ver_recibo.php?id_recibo='+id_recibo,'recibo','','1024','768','true');
}
