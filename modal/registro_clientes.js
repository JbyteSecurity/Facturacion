$(document).ready(function () {
 		$("#ruc").blur(function(){
   		    buscardni();
		});
});


function buscardni()
{

    var ruc = $("#ruc").val();
	$.post("modal/buscar_ruc.php", { ruc:ruc } ,function(data){
			$("#nombre").val("");
			$("#nombre").val(data);
			$('#nombre').prop('readonly', true);
			
        });
}