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
			<table border=3 style="margin-left:45px; font-weight:bold;" >
			<tr>
			<td>
			10292215598
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
			echo "B001-".$numero_boleta;
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
				$sql_cliente=mysqli_query($con,"select * from clientes where id_cliente='$id_cliente'");
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
				$sql=mysqli_query($con, "select * from boletas where numero_boleta='".$numero_boleta."'");
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
		  <td style="width:25%;"><?php echo date("d/m/Y", strtotime($fecha_boleta));?></td>
		   <td style="width:40%;" >
				<?php 
				if ($condiciones==1){echo "Efectivo";}
				elseif ($condiciones==2){echo "Cheque";}
				elseif ($condiciones==3){echo "Transferencia bancaria";}
				elseif ($condiciones==4){echo "Crédito";}
				elseif ($condiciones==5){echo "Tarjeta de Credito Visa";}
				?>
		   </td>
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
$cantidad = 1;    
$sql = 	mysqli_query($con, "select count(*) as items from products, detalle_boleta, boletas where products.id_producto=detalle_boleta.id_producto and detalle_boleta.numero_boleta=boletas.numero_boleta and boletas.numero_boleta='".$numero_boleta."'");
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
$nums=1;
$sumador_total=0.00;
$sql=mysqli_query($con, "select * from products, detalle_boleta, boletas where products.id_producto=detalle_boleta.id_producto and detalle_boleta.numero_boleta=boletas.numero_boleta and boletas.numero_boleta='".$numero_boleta."'");
$igv2 = 0;
while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad'];
	$nombre_producto=$row['nombre_producto'];
	$igv = $row['igv'];
	$igv2 = $igv*$cantidad;
	$igv3 = $igv2+$igv3;
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
	echo "<tr><td colspan='2' height='25' style='widtd: 85%; text-align: left;'><br></td> </tr>";
	
?>
	  
       	<tr style="border: 1px solid black;">
		    <td></td>
			<td colspan="3" style="widtd: 85%; text-align: right;">Monto Descuentos: </td>
			<td style="widtd: 15%; text-align: right;border: 1px solid black;border-collapse: collapse;">0.00</td>
		</tr> 
        <tr>
			<td></td>
            <td colspan="3" style="widtd: 85%; text-align: right;">Op. Gravadas: </td>
            <td style="widtd: 15%; text-align: right;border: 1px solid black;border-collapse: collapse;"> <?php echo number_format($subtotal,2);?></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="3" style="widtd: 85%; text-align: right;">Op. Inafectas: </td>
			<td style="widtd :15%; text-align: right;border: 1px solid black;border-collapse: collapse;">0.00</td>
 		</tr>
		<tr>
			<td></td>
			<td colspan="3" style="widtd: 85%; text-align: right;">Op. Exoneradas: </td>
			<td style="widtd :15%; text-align: right;border: 1px solid black;border-collapse: collapse;">0.00</td>
 		</tr>
		<tr>
			<td></td>
			<td colspan="3" style="widtd: 85%; text-align: right;">Monto Percepción: </td>
			<td style="widtd :15%; text-align: right;border: 1px solid black;border-collapse: collapse;">0.00</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="3" style="widtd: 85%; text-align: right;">Venta Gratuita: </td>
			<td style="widtd :15%; text-align: right;border: 1px solid black;border-collapse: collapse;">0.00</td>
		</tr>					
		<tr>
			<td></td>
            <td colspan="3" style="widtd: 85%; text-align: right;">IGV (<?php echo (TAX-1)*100; ?>)% S/ </td>
            <td style="widtd: 15%; text-align: right;border: 1px solid black;border-collapse: collapse;"> <?php echo number_format($igv3,2);?></td>
		</tr>
		<tr>
			<td></td>
            <td colspan="3" style="widtd: 85%; text-align: right;">Importe Total: </td>
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

