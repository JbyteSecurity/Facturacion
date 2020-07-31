<?php
//error_reporting(E_ERROR);
?>
<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
td {
border:hidden;
overflow-x:hidden;
}
table {
border: 2px solid #000000;
}


-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 100%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA;?></span>
				<br><?php echo DIRECCION_EMPRESA;?><br> 
				Teléfono: <?php echo TELEFONO_EMPRESA;?><br>
				Web: http://www.rodriguezvelarde.com.pe/<br>
                <br>
                <br>
                <br>
                <span style="color: #34495e;font-size:20px;font-weight:bold">Reporte de  <?php echo $tipo_documento."s";?></span><br>
                <br>
                <br>
            </td>		
        </tr>
    </table>
 
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt; border:2px;">
        <tr>
            <th style="width: 20%;text-align:center" class='midnight-blue'>NOMBRE CLIENTE</th>
            <th style="width: 10%;text-align:center" class='midnight-blue'>RUC</th>      
            <th style="width: 10%;text-align: right" class='midnight-blue'>NUMERO</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>FECHA</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>TOTAL VENTA</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>KARDEX</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>VENDEDOR</th>
            
        </tr>

<?php
$nums=1;

$date = str_replace('/', '-', $fecha_inicial );
$fechainicial = date("Y-m-d", strtotime($date));

$date2 = str_replace('/', '-', $fecha_final );
$fechafinal = date("Y-m-d", strtotime($date2));

if($tipo_documento=="Factura")
{
    $sql=mysqli_query($con, "select c.nombre_cliente, c.ruc, c.direccion_cliente, b.numero_factura as numero, b.fecha_factura as fecha, b.total_venta, b.kardex, CONCAT(u.firstname,' ',u.lastname) as VENDEDOR from facturas b inner join clientes c on c.id_cliente = b.id_cliente inner join users u on u.user_id = b.id_vendedor where b.fecha_factura >= '$fechainicial' and b.fecha_factura <= '$fechafinal' ");

}
if($tipo_documento=="Boleta")
{
	
    $sql=mysqli_query($con, "select c.nombre_cliente, c.ruc, c.direccion_cliente, b.numero_boleta as numero, b.fecha_boleta as fecha, b.total_venta, b.kardex, CONCAT(u.firstname,' ',u.lastname) as VENDEDOR from boletas b inner join clientes c on c.id_cliente = b.id_cliente inner join users u on u.user_id = b.id_vendedor where b.fecha_boleta >= '$fechainicial' and  b.fecha_boleta <= '$fechafinal' ");

}
if($tipo_documento=="Nota")
{
    $sql=mysqli_query($con, "select c.nombre_cliente, c.ruc, c.direccion_cliente, b.numero_nota as numero, b.fecha_nota as fecha, (select total_venta from facturas where numero_factura=b.numero_factura) as total_venta, '' as kardex, CONCAT(u.firstname,' ',u.lastname) as VENDEDOR from nota b inner join clientes c on c.id_cliente =(select id_cliente from facturas where numero_factura=b.numero_factura) inner join users u on u.user_id = b.id_vendedor where b.fecha_nota >= '$fechainicial' and  b.fecha_nota <= '$fechafinal' ");

}


while ($row=mysqli_fetch_array($sql))
	{
	
	$nombre_cliente=$row["nombre_cliente"];
	$ruc=$row["ruc"];
	$direccion_cliente=$row['direccion_cliente'];
	$numero_boleta=$row['numero'];
	$fecha_boleta=$row['fecha'];
	$total_venta = $row['total_venta'];
    $kardex = $row['kardex'];
	$VENDEDOR=$row['VENDEDOR'];	
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 20%; text-align: center"><?php echo $nombre_cliente; ?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $ruc; ?></td>            
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php echo $numero_boleta;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $fecha_boleta;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $total_venta;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $kardex;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $VENDEDOR;?></td>
            
        </tr>

	<?php 	
	$nums++;
	}
	
?>

		
	</table>

</page>
