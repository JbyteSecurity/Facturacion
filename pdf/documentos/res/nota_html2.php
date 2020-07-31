<?php
//error_reporting(E_ERROR);
?>
<?php 
error_reporting(0);
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
.headt td {
  min-width: 235px;
  height: 50px;  
}
.headt2 td {
  min-width: 235px;
  height: 100px;  
}
.headt3 td {
  min-width: 235px;
  height: 255px;  
}
.headt4 td {
  min-width: 235px;
  height: 20px;  
}
.headt5 td {
  min-width: 235px;
  height: 5px;  
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;height: 9%;" src="../../img/logo.jpg" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA;?></span>
				<br><?php echo DIRECCION_EMPRESA;?><br> 
				Teléfono: <?php echo TELEFONO_EMPRESA;?><br>
				                
            </td>
			<td style="width: 25%;text-align:center;">
			<table border=3 style="text-align:center;font-weight:bold;border-style:solid;border-width: 3px;">
			<tr>
			<td>
			10292215598
			</td>
			</tr>
			<tr>
			<td>
			NOTA
			</td>
			</tr>
			<tr>
			<td>
			CREDITO
			</td>
			</tr>		
			<tr>
			<td>
			<?php
		    $cantidad = strlen($numero_nota); 
			if($cantidad == "1")
			{
				$numero_nota = "0000000".$numero_nota;
			}

            if($cantidad == "2")
			{
				$numero_nota = "000000".$numero_nota;
			}

			if($cantidad == "3")
			{
				$numero_nota = "00000".$numero_nota;
			}

			if($cantidad == "4")
			{
				$numero_nota = "0000".$numero_nota;
			}

			if($cantidad == "5")
			{
				$numero_nota = "000".$numero_nota;
			}

			if($cantidad == "6")
			{
				$numero_nota = "00".$numero_nota;
			}

			if($cantidad == "7")
			{
				$numero_nota = "0".$numero_nota;
			}
			echo "001-".$numero_nota;
			?>
			</td>
		    </tr>
			</table>
			</td>	
        </tr>
    </table>
	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
	<tr>
           <td style="width:15%;" class='midnight-blue'></td>
		   <td style="width:85%;" class='midnight-blue'></td>
        </tr>
		<tr>
           <td style="width:15%;" >
			<?php 
				
				echo "RUC: ";				
			?>
			
		   </td>
		   <td style="width:85%;" >
			<?php 
		    	$sql_cliente=mysqli_query($con,"select * from clientes c inner join boletas f on f.id_cliente =  c.id_cliente where f.numero_boleta='$numero_factura'");
			    $rw_cliente=mysqli_fetch_array($sql_cliente);				
				echo $rw_cliente['ruc'];				
			?>
			
		   </td>
        </tr>
		<tr>
           <td style="width:15%;" >
			<?php 
				echo "Cliente: ";				
			?>
			
		   </td>
		   <td style="width:85%;" >
			<?php 
				echo $rw_cliente['nombre_cliente'];	
			?>
			
		   </td>
        </tr>
		<tr>
           <td style="width:15%;" >
			<?php 						
				echo "Direcciòn: ";					
			?>
			
		   </td>
		   <td style="width:85%;" >
			<?php 						
				echo $rw_cliente['direccion_cliente'];			
			?>
			
		   </td>
        </tr>
        <tr>
           <td style="width:15%;" >
			<?php 						
				echo "Departamento: ";					
			?>
			
		   </td>
		   <td style="width:85%;" >
			<?php 	
				$id = $rw_cliente['departamento'];
				$sql_departamento=mysqli_query($con,"SELECT name FROM regions WHERE id = '$id'");
				$rw_departamento=mysqli_fetch_array($sql_departamento);				
				echo $rw_departamento['name'];						
						
			?>
			
		   </td>
        </tr>
        <tr>
           <td style="width:15%;" >
			<?php 						
				echo "Provincia: ";					
			?>
			
		   </td>
		   <td style="width:85%;" >
			<?php 	
				$id = $rw_cliente['provincia'];
				$sql_provincia=mysqli_query($con,"SELECT name FROM provinces WHERE id = '$id'");
				$rw_provincia=mysqli_fetch_array($sql_provincia);				
				echo $rw_provincia['name'];						
						
			?>
			
		   </td>
        </tr>
         <tr>
           <td style="width:15%;" >
			<?php 						
				echo "Distrito: ";					
			?>
			
		   </td>
		   <td style="width:85%;" >
			<?php 	
				$id = $rw_cliente['ubigeo'];
				$sql_distrito=mysqli_query($con,"SELECT name FROM districts WHERE id = '$id'");
				$rw_distrito=mysqli_fetch_array($sql_distrito);				
				echo $rw_distrito['name'];						
						
			?>
			
		   </td>
        </tr>
		<tr>
           <td style="width:15%;" >
			<?php 
				echo "Teléfono: ";							
			?>
			
		   </td>
		   <td style="width:85%;" >
			<?php 
				echo $rw_cliente['telefono_cliente'];				
			?>
			
		   </td>
        </tr>
		<tr>
           <td style="width:15%;" >
			<?php 
				echo "Email: ";						
			?>
			
		   </td>
		   <td style="width:85%;" >
			<?php 
				echo $rw_cliente['email_cliente'];				
			?>
			
		   </td>
        </tr>
        <tr>
           <td style="width:15%;" >
			<?php 
				echo "Kardex: ";
			?>
			
		   </td>
		   <td style="width:85%;" >
			<?php
				$sql=mysqli_query($con, "select * from boletas where numero_boleta='".$numero_factura."'");
				if($rowww=mysqli_fetch_array($sql))
				{
					$kardex = $rowww["kardex"];
					echo $kardex;
				}
			?>
			
		   </td>
        </tr>
    </table>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>VENDEDOR</td>
		   <td style="width:25%;" class='midnight-blue'>FECHA</td>
		   <td style="width:40%;" class='midnight-blue'></td>
        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from users u inner join boletas f on f.id_vendedor = u.user_id where f.numero_boleta='$numero_factura'");
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['firstname']." ".$rw_user['lastname'];
				$id_vendedor = $rw_cliente['id_vendedor'];
			?>
		   </td>
		  <td style="width:25%;"><?php echo date("d/m/Y");?></td>		  
        </tr>
		
        
   
    </table>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CANT.</th>
			<th style="width: 10%;text-align:center" class='midnight-blue'>CODIGO</th>
            <th style="width: 50%" class='midnight-blue'>DESCRIPCION</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
            
        </tr>

<?php
	$sql=mysqli_query($con, "select count(*) as items from products, detalle_boleta, boletas where products.id_producto=detalle_boleta.id_producto and detalle_boleta.numero_boleta=boletas.numero_boleta and boletas.numero_boletas='".$numero_factura."'");
	$cantidad = 0;
	if($row=mysqli_fetch_array($sql))
	{
		$cantidad = $row["items"];
	}
	if($cantidad >= 5)
	{
			$detalle="headt5";
	}
	if($cantidad == 4)
	{
			$detalle="headt4";
	}
	if($cantidad == 3)
	{
			$detalle="headt";
	}
	if($cantidad == 2)
	{
			$detalle="headt2";
	}
	if($cantidad == 1)
	{
			$detalle="headt3";
	}
	$cantidad = 1;
	$nums=1;
	$sumador_total=0;
	$igv2 = 0;
	$sql=mysqli_query($con, "select * from products, detalle_boleta, boletas where products.id_producto=detalle_boleta.id_producto and detalle_boleta.numero_boleta=boletas.numero_boleta and boletas.numero_boleta='".$numero_factura."'");
	while ($row=mysqli_fetch_array($sql))
		{
		
		$id_producto=$row["id_producto"];
		$codigo_producto=$row['codigo_producto'];
		$cantidad=$row['cantidad'];
		$nombre_producto=$row['nombre_producto'];
		$igv = $row['igv'];
		$igv2 = $igv*$cantidad;
		$igv3 = $igv2+$igv3;
		$boleta_num = $row['numero_boleta'];
		$precio_venta=$row['precio_venta'];
		$precio_producto_igv = $precio_venta +$igv;
		$precio_producto_igv_total = $precio_producto_igv  * $cantidad;
		$sumador_total_producto += $precio_producto_igv_total;
		$precio_venta_f=number_format($precio_venta,2);//Formateo variables
		$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
		$precio_total=($precio_venta_r+$igv)*$cantidad;	
		$precio_total = $precio_total/(1+0.18);
		$igv3 = $precio_venta * 0.18;
		$precio_total_f=number_format($precio_total,2);//Precio total formateado
		$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
		$precio_total_r = 	(double)$precio_total_r;
		$sumador_total+=$precio_total_r;//Sumador
		if ($nums%2==0){
			$clase="clouds";
		} else {
			$clase="silver";
		}

	?>

        <tr class='<?php echo $detalle;?>' >
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center; padding-top:20px;border-right:2px solid #0000;border:1px solid #000000;"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center; padding-top:20px;border-right:2px solid #0000;border:1px solid #000000;"><?php echo $codigo_producto; ?></td>
            <td class='<?php echo $clase;?>' style="width: 50%; text-align: left; padding-top:20px;border-right:2px solid #0000;border:1px solid #000000;"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right; padding-top:20px;border-right:2px solid #0000;border:1px solid #000000;"><?php echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right; padding-top:20px;border-right:2px solid #0000;border:1px solid #000000;"><?php echo $precio_total_f;?></td>
            
        </tr>

	<?php 

	
	$nums++;
	}
	$neto_producto = $sumador_total_producto/(1+0.18);
	$igv_producto = $sumador_total_producto - $neto_producto;
	$subtotal=$neto_producto;
	$igv2 = (double)$igv * $cantidad;
	$igv3 = $subtotal * 0.18;	
	$total_factura=0.00;
	$igv3 = round($igv_producto, 2);
			
	$total_boleta=$subtotal+$igv3;
	echo "<tr><td colspan='2' height='50' style='widtd: 85%; text-align: left;'><br></td> </tr>";


	?>
	  

  
        <tr>
			<td></td>
            <td colspan="3" style="widtd: 85%; text-align: right;">SUBTOTAL S/ </td>
            <td style="widtd: 15%; text-align: right;border: 1px solid black;border-collapse: collapse;"> <?php echo number_format($subtotal,2);?></td>
        </tr>
		<tr>
			<td></td>
            <td colspan="3" style="widtd: 85%; text-align: right;">IGV (<?php echo (TAX-1)*100; ?>)% S/ </td>
            <td style="widtd: 15%; text-align: right;border: 1px solid black;border-collapse: collapse;"> <?php echo number_format($igv3,2);?></td>
        </tr><tr>
			<td></td>
            <td colspan="3" style="widtd: 85%; text-align: right;">TOTAL S/ </td>
            <td style="widtd: 15%; text-align: right;border: 1px solid black;border-collapse: collapse;"> <?php echo number_format($total_boleta,2);?></td>
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
	<br>
</page>

<?php
$date=date("Y-m-d H:i:s");

$sql=mysqli_query($con, "select numero from correlativos where documento ='nota' ");
$rw=mysqli_fetch_array($sql);
$numero_nota=$rw['numero'];	
$nuevo_numero = $rw['numero'] + 1;	

$insert=mysqli_query($con,"INSERT INTO nota VALUES (0,'$numero_nota','$date','$tipo_nota','$numero_factura','$motivo','$id_vendedor')");
$insertcorrelativo = mysqli_query($con,"UPDATE correlativos set numero = $nuevo_numero where documento ='Nota' ");	 
	 $cantidad = strlen($numero_nota);  
			if($cantidad == "1")
			{
				$numero_nota = "0000000".$numero_nota;
			}

            if($cantidad == "2")
			{
				$numero_nota = "000000".$numero_nota;
			}

			if($cantidad == "3")
			{
				$numero_nota = "00000".$numero_nota;
			}

			if($cantidad == "4")
			{
				$numero_nota = "0000".$numero_nota;
			}

			if($cantidad == "5")
			{
				$numero_nota = "000".$numero_nota;
			}

			if($cantidad == "6")
			{
				$numero_nota = "00".$numero_nota;
			}

			if($cantidad == "7")
			{
				$numero_nota = "0".$numero_nota;
			}
			$cantidad = strlen($numero_factura);  
			if($cantidad == "1")
			{
				$numero_factura = "0000000".$numero_factura;
			}

            if($cantidad == "2")
			{
				$numero_factura = "000000".$numero_factura;
			}

			if($cantidad == "3")
			{
				$numero_factura = "00000".$numero_factura;
			}

			if($cantidad == "4")
			{
				$numero_factura = "0000".$numero_factura;
			}

			if($cantidad == "5")
			{
				$numero_factura = "000".$numero_factura;
			}

			if($cantidad == "6")
			{
				$numero_factura = "00".$numero_factura;
			}

			if($cantidad == "7")
			{
				$numero_factura = "0".$numero_factura;
			}

	//Creamos Archivo txt
    $pdf = "10292215598-07-B001-".$numero_nota;
	$ruc = "E:/SFS_v1.2/sunat_archivos/sfs/DATA/"."10292215598-07-B001-".$numero_nota.".NOT";
	//$ruc = "10292215598-07-B001-".$numero_nota.".NOT";
	$date=date("Y-m-d");
	$hora=date("H:i:s");
	$documento = trim($rw_cliente['ruc']);
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
	$factura = "B001-". $numero_factura;
	fputs($file, "0101|".$date."|".$hora."|0000|".$tipodocumento."|".$documento."|".$nombre."|PEN|03|".$motivo."|03|".$factura."|".round($igv3,2)."|".round($subtotal, 2)."|".round($total_boleta,2)."|0.00|0.00|0.00|".round($total_boleta,2)."|2.1|2.0|");
	fclose($file);  

    //Creamos Archivo Detalle Sunat
	$ruc2 = "E:/SFS_v1.2/sunat_archivos/sfs/DATA/"."10292215598-07-B001-".$numero_nota.".DET";
	//$ruc2 = "10292215598-07-B001-".$numero_nota.".DET";
	$file2 =fopen($ruc2, "a") or die("Problemas");
	$query = "select * from detalle_boleta, products where products.id_producto=detalle_boleta.id_producto and detalle_boleta.numero_boleta='".$boleta_num."'";
	$sql=mysqli_query($con, $query);	
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
 		$preciototalunitario = round($preciototalunitario, 2);
	    $pos2 = strpos($preciototalunitario, ".");
		if ($pos2 === false) {
        $preciototalunitario = $preciototalunitario.".00";
		} 
		$igv=$row["igv"];
		$igvunitario = ($precioproducto*$cantidad) * 0.18;
		$productounitatio= $precioproducto+$igv;
		$productototal =  $productounitatio * $cantidad;
		$igvtotal = $productototal /  (1+0.18);

		$igv=number_format($igv,2,'.','');
 		$total = $preciototalunitario + $igv;
		$pos3 = strpos($total, ".");
		if ($pos3 === false) {
         $total = $total.".00";
		} 
		$total=number_format($total,2,'.','');
		$precioproducto = number_format($precioproducto,2,'.','');
		$preciototalunitario = number_format($preciototalunitario,2,'.','');
		//fwrite($file2, "ZZ|".$cantidad."|".$codigoproducto."||".$nombreproducto."|".$precioproducto."|0.00|".$igv."|10|0.00|01|".$preciototalunitario."|".$total."|");
		//fwrite($file2, "NIU|".$cantidad."|".$codigoproducto."||".$nombreproducto."|".$precioproducto."|0.00|".$igv."|10|0.00|01|".$preciototalunitario."|".$total."|");
		$totalfinal = $productototal ;
		fwrite($file2, "NIU|".$cantidad."|".$codigoproducto."|-|".$nombreproducto."|".$precioproducto."|".round($igvunitario,2)."|1000|".round($igvunitario,2)."|".round($precioproducto*$cantidad,2)."|IGV|VAT|10|18|-|||||||-||||||".round($totalfinal,2)."|".$preciototalunitario."|0|");
		fwrite($file2,"\n"); 
	
	}
		fclose($file2);
	//Creamos Archivo Tributos Generales
	$ruc3 = "E:/SFS_v1.2/sunat_archivos/sfs/DATA/"."10292215598-07-B001-".$numero_nota.".TRI";
	//$ruc3 = "10292215598-07-B001-".$numero_nota.".TRI";
	$file3 =fopen($ruc3, "a") or die("Problemas");
	fwrite($file3, "1000|IGV|VAT|".round($subtotal, 2)."|".round($igv3,2)."|");
	fwrite($file3,"\n");{  
	
	}
	fclose($file3); 

	//Creamos Archivo Tributos Generales
	$ruc4 = "E:/SFS_v1.2/sunat_archivos/sfs/DATA/"."10292215598-07-B001-".$numero_nota.".LEY";
	//$ruc4 = "10292215598-07-B001-".$numero_nota.".LEY";
	$file4 =fopen($ruc4, "a") or die("Problemas");
	fwrite($file4, "1000|".$letra."|");
	fwrite($file4,"\n");{  
	
	}
	fclose($file4); 
 
?>
