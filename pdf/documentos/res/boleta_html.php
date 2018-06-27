<?php
//error_reporting(E_ERROR);
?>
<?php 
require_once("letrasanumeros.php");
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
border: 1px solid #000000;
}


-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../img/logo.jpg" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA;?></span>
				<br><?php echo DIRECCION_EMPRESA;?><br> 
				Teléfono: <?php echo TELEFONO_EMPRESA;?><br>
				Web: http://www.rodriguezvelarde.com.pe/
                
            </td>
			<td style="width: 25%;text-align:center;">
			<table border=3 style="text-align:center;margin-left:120px;font-weight:bold;border-style:solid;border-width: 3px;">
			<tr>
			<td>
			10292356817
			</td>
			</tr>
			<tr>
			<td>
			BOLETA
			</td>
			</tr>
			<tr>
			<td>
			ELECTRONICA
			</td>
			</tr>		
			<tr>
			<td>
			<?php 
			$boleta = $numero_boleta;
            $cantidad = strlen($numero_boleta);  
			if($cantidad == "1")
			{
				$numero_boleta = "0000000".$numero_boleta;
			}

            if($cantidad == "2")
			{
				$numero_boleta = "000000".$numero_boleta;
			}

			if($cantidad == "3")
			{
				$numero_boleta = "00000".$numero_boleta;
			}

			if($cantidad == "4")
			{
				$numero_boleta = "0000".$numero_boleta;
			}

			if($cantidad == "5")
			{
				$numero_boleta = "000".$numero_boleta;
			}

			if($cantidad == "6")
			{
				$numero_boleta = "00".$numero_boleta;
			}

			if($cantidad == "7")
			{
				$numero_boleta = "0".$numero_boleta;
			}
                echo "B003-".$numero_boleta;
			?>
			</td>
		    </tr>
			</table>
			</td>	
        </tr>
    </table>
	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:100%;" class='midnight-blue'></td>
        </tr>
		<tr>
           <td style="width:50%;" >
			<?php 
				$sql_cliente=mysqli_query($con,"select * from clientes where id_cliente='$id_cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
				echo "<br> RUC: ";
				echo $rw_cliente['ruc'];				
				echo "<br> Cliente: ";
				echo $rw_cliente['nombre_cliente'];			
				echo "<br> Direcciòn: ";
				echo $rw_cliente['direccion_cliente'];
				echo "<br> Teléfono: ";
				echo $rw_cliente['telefono_cliente'];
				echo "<br> Email: ";
				echo $rw_cliente['email_cliente'];
			?>
			
		   </td>
        </tr>
   
    </table>
    
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>ABOGADO</td>
		  <td style="width:25%;" class='midnight-blue'>FECHA</td>
		   <td style="width:40%;" class='midnight-blue'>FORMA DE PAGO</td>
        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from users where user_id='$id_vendedor'");
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['firstname']." ".$rw_user['lastname'];
			?>
		   </td>
		  <td style="width:25%;"><?php echo date("d/m/Y");?></td>
		   <td style="width:40%;" >
				<?php 
				if ($condiciones==1){echo "Efectivo";}
				elseif ($condiciones==2){echo "Cheque";}
				elseif ($condiciones==3){echo "Transferencia bancaria";}
				elseif ($condiciones==4){echo "Crédito";}
				?>
		   </td>
        </tr>
    </table>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 60%" class='midnight-blue'>DESCRIPCION</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
            
        </tr>

<?php
$nums=1;
$sumador_total=0;
$igv2 = 0;
$sql=mysqli_query($con, "select * from products, tmp where products.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
while ($row=mysqli_fetch_array($sql))
	{
	error_log($row['codigo_producto']);
	$id_tmp=$row["id_tmp"];
	$id_producto=$row["id_producto"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad_tmp'];
	$nombre_producto=$row['nombre_producto'];
	$igv = $row['igv'];
    $igv2 = $igv + $igv2; 
	$precio_venta=$row['precio_producto'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 60%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_total_f;?></td>
            
        </tr>

	<?php 
	//Insert en la tabla detalle_cotizacion
	$insert_detail=mysqli_query($con, "INSERT INTO detalle_boleta VALUES (0,'$numero_boleta','$id_producto','$cantidad','$precio_venta_r')");
	
	$nums++;
	}
	$sql=mysqli_query($con, "select numero from correlativos where documento ='Boleta' ");
	$rw2=mysqli_fetch_array($sql);
	$numero_boleta=$rw2['numero'];	
	$nuevo_numero = $rw2['numero'] + 1;	
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * TAX )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_boleta=$subtotal+$igv2;
?>

		<tr>
			<td colspan="3" style="widtd: 85%; text-align: right;">Monto Descuentos: </td>
			<td style="widtd: 15%; text-align: right;">0.00</td>
		</tr> 
        <tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">Op. Gravadas: </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($subtotal,2);?></td>
		</tr>
 	    <tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">Op. Inafectas: </td>
            <td style="widtd: 15%; text-align: right;">0.00</td>
        </tr>
		<tr>
			<td colspan="3" style="widtd: 85%; text-align: right;">Op. Exoneradas: </td>
			<td style="widtd :15%; text-align: right;">0.00</td>
 		</tr>
		<tr>
			<td colspan="3" style="widtd: 85%; text-align: right;">Monto Percepción: </td>
			<td style="widtd :15%; text-align: right;">0.00</td>
		</tr>
		<tr>
			<td colspan="3" style="widtd: 85%; text-align: right;">Venta Gratuita: </td>
			<td style="widtd :15%; text-align: right;">0.00</td>
		</tr>					
		<tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">IGV: (<?php echo (TAX-1)*100; ?>)% S/ </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($igv2,2);?></td>
		</tr>
		<tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">Importe Total: </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_boleta,2);?></td>
        </tr>
        <tr>

       	<td colspan="3" style="widtd: 85%; text-align: left;"> <?php $letra = convertir_a_letras(number_format($total_boleta,2)); echo "SON: ".$letra; ?></td>
        </tr>
    	<tr>
        	<td colspan="3" style="widtd: 85%; text-align: left;"><br></td>
        </tr>
     	<tr>
        	<td colspan="3" style="widtd: 85%; text-align: left;"><br></td>
        </tr>
     	<tr>
        	<td colspan="3" style="widtd: 85%; text-align: left;"><br></td>
        </tr>
    	<tr>
        	<td colspan="3" style="widtd: 85%; text-align: left;"><br></td>
        </tr>

    	<tr>
        	<td colspan="3" style="widtd: 85%; text-align: center;">CANCELADO </td>
		</tr>
    	<tr>
        	<td colspan="3" style="widtd: 85%; text-align: left;"><br></td>
        </tr>

		<tr>
        	<td colspan="3" style="widtd: 85%; text-align: left;">____________DE____________DEL____________</td>
		</tr>
		<tr>
        	<td colspan="3" style="widtd: 85%; text-align: left;"><br></td>
        </tr>

	</table>

</page>

<?php
$date=date("Y-m-d H:i:s");

$insert=mysqli_query($con,"INSERT INTO boletas VALUES (0,'$numero_boleta','$date','$id_cliente','$id_vendedor','$condiciones','$total_boleta','1')");
$delete=mysqli_query($con,"DELETE FROM tmp WHERE session_id='".$session_id."'");
$insertcorrelativo = mysqli_query($con,"UPDATE correlativos set numero = $nuevo_numero where documento ='Boleta' ");	 
			$cantidad = strlen($numero_boleta);  
			$boleta = $numero_boleta;
			if($cantidad == "1")
			{
				$numero_boleta = "0000000".$numero_boleta;
			}

            if($cantidad == "2")
			{
				$numero_boleta = "000000".$numero_boleta;
			}

			if($cantidad == "3")
			{
				$numero_boleta = "00000".$numero_boleta;
			}

			if($cantidad == "4")
			{
				$numero_boleta = "0000".$numero_boleta;
			}

			if($cantidad == "5")
			{
				$numero_boleta = "000".$numero_boleta;
			}

			if($cantidad == "6")
			{
				$numero_boleta = "00".$numero_boleta;
			}

			if($cantidad == "7")
			{
				$numero_boleta = "0".$numero_boleta;
			}
                
			
	//Creamos Archivo txt
    $pdf = "10292356817-03-B003-".$numero_boleta;
	$ruc = "D:/data0/facturador/DATA/"."10292356817-03-B003-".$numero_boleta.".CAB";
	$date=date("Y-m-d");
	$documento = $rw_cliente['ruc'];
	$nombre = $rw_cliente['nombre_cliente'];	
	$tipodocumento = "";
	if(strlen($documento)==8){
		$tipodocumento = "1";
	}
	if(strlen($documento)==11){
		$tipodocumento = "6";
	}
    $total_boleta=number_format($total_boleta,2,'.','');
	$file =fopen($ruc, "a") or die("Problemas");
	fputs($file, "01|".$date."||".$tipodocumento."|".$documento."|".$nombre."|PEN|0.00|0.00|0.00|".$subtotal."|0.00|0.00|".$igv2."|0.00|0.00|".$total_boleta."|");
	fclose($file);  

    //Creamos Archivo Detalle Sunat
	$ruc2 = "D:/data0/facturador/DATA/"."10292356817-03-B003-".$numero_boleta.".DET";
	$file2 =fopen($ruc2, "a") or die("Problemas");
	$sql=mysqli_query($con, "select * from detalle_boleta, products where products.id_producto=detalle_boleta.id_producto and detalle_boleta.numero_boleta='".$boleta."'");
    $query = "select * from detalle_boleta, products where products.id_producto=detalle_boleta.id_producto and detalle_boleta.numero_boleta='".$boleta."'";
    echo $query;
	while ($row=mysqli_fetch_array($sql))
	{
	$cantidad=$row["cantidad"].".00";
	$codigoproducto=$row["codigo_producto"];
	$nombreproducto = $row["nombre_producto"];
	$precioproducto = $row["precio_producto"];
	$pos = strpos($precioproducto, ".");
	if ($pos === false) {
        $precioproducto = $precioproducto.".00";
	} 
    
    $preciototalunitario =  $cantidad * $precioproducto;
	$pos2 = strpos($preciototalunitario, ".");
	if ($pos2 === false) {
        $preciototalunitario = $preciototalunitario.".00";
	} 
	$igv=$row["igv"];
	$igv=number_format($igv,2,'.','');
    $total = $preciototalunitario + $igv;
	$pos3 = strpos($total, ".");
	if ($pos3 === false) {
        $total = $total.".00";
	} 
	$total=number_format($total,2,'.','');
	$precioproducto = number_format($precioproducto,2,'.','');
	$preciototalunitario = number_format($preciototalunitario,2,'.','');
	fwrite($file2, "NIU|".$cantidad."|".$codigoproducto."||".$nombreproducto."|".$precioproducto."|0.00|".$igv."|10|0.00|01|".$preciototalunitario."|".$total."|");
	fwrite($file2,"\n");  
	
	}
	fclose($file2);


    //Creamos Archivo Adicional Cabecera
	$ruc3 = "D:/data0/facturador/DATA/"."10292356817-03-B003-".$numero_boleta.".ACA";
	$file3 =fopen($ruc3, "a") or die("Problemas");
	$sql=mysqli_query($con, "Select direccion_cliente, ubigeo  from clientes where id_cliente =".$id_cliente."");
	//echo $sql;
    $direccion_cliente = "";

	while ($row=mysqli_fetch_array($sql))
	{
			
    	$direccion_cliente = $row["direccion_cliente"];
		$ubigeo = $row["ubigeo"];
	} 

	fwrite($file3, "01|0.00|0.00|0.00|0.00|0.00|PER|".$ubigeo."|".$direccion_cliente."||||".$date."|");
	fwrite($file3,"\n");{  
	
	}
	fclose($file3);


?>
