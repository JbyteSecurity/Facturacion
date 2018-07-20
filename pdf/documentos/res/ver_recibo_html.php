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
			<table border=3 style="margin-left:45px; font-weight:bold;" >
			<tr>
			<td>
			10292356817
			</td>
			</tr>
			<tr>
			<td>
			RECIBO
			</td>
			</tr>
			<tr>
			<td>
			ELECTRONICO
			</td>
			</tr>		
			<tr>
			<td>
			<?php 
			$cantidad = strlen($numero_recibo);  
			if($cantidad == "1")
			{
				$numero_recibo = "0000000".$numero_recibo;
			}

            if($cantidad == "2")
			{
				$numero_recibo = "000000".$numero_recibo;
			}

			if($cantidad == "3")
			{
				$numero_recibo = "00000".$numero_recibo;
			}

			if($cantidad == "4")
			{
				$numero_recibo = "0000".$numero_recibo;
			}

			if($cantidad == "5")
			{
				$numero_recibo = "000".$numero_recibo;
			}

			if($cantidad == "6")
			{
				$numero_recibo = "00".$numero_recibo;
			}

			if($cantidad == "7")
			{
				$numero_recibo = "0".$numero_recibo;
			}
			echo "B003-".$numero_recibo;
			?>
			</td>
			</tr>
			</table>
			</td>
        </tr>
    </table>
	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:10%;" class='midnight-blue'></td>
		   <td style="width:90%;" class='midnight-blue'></td>
        </tr>
		<tr>
           <td style="width:10%;" >
			<?php 
				
				echo "RUC: ";				
			?>
			
		   </td>
		   <td style="width:90%;" >
			<?php 
				$sql_cliente=mysqli_query($con,"select * from clientes where id_cliente='$id_cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);				
				echo $rw_cliente['ruc'];				
			?>
			
		   </td>
        </tr>
		<tr>
           <td style="width:10%;" >
			<?php 
				echo "Cliente: ";				
			?>
			
		   </td>
		   <td style="width:90%;" >
			<?php 
				echo $rw_cliente['nombre_cliente'];	
			?>
			
		   </td>
        </tr>
		<tr>
           <td style="width:10%;" >
			<?php 						
				echo "Direcciòn: ";					
			?>
			
		   </td>
		   <td style="width:90%;" >
			<?php 						
				echo $rw_cliente['direccion_cliente'];			
			?>
			
		   </td>
        </tr>
		<tr>
           <td style="width:10%;" >
			<?php 
				echo "Teléfono: ";							
			?>
			
		   </td>
		   <td style="width:90%;" >
			<?php 
				echo $rw_cliente['telefono_cliente'];				
			?>
			
		   </td>
        </tr>
		<tr>
           <td style="width:10%;" >
			<?php 
				echo "Email: ";						
			?>
			
		   </td>
		   <td style="width:90%;" >
			<?php 
				echo $rw_cliente['email_cliente'];				
			?>
			
		   </td>
        </tr>
        <tr>
           <td style="width:10%;" >
			<?php 
				echo "Kardex: ";
			?>
			
		   </td>
		   <td style="width:90%;" >
			<?php 
				$sql=mysqli_query($con, "select * from recibos where numero_recibo='".$numero_recibo."'");
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
		  <td style="width:25%;"><?php echo date("d/m/Y", strtotime($fecha_recibo));?></td>
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
$nums=1;
$sumador_total=0;
$sql=mysqli_query($con, "select * from products, detalle_recibo, recibos where products.id_producto=detalle_recibo.id_producto and detalle_recibo.numero_recibo=recibos.numero_recibo and recibos.numero_recibo='".$numero_recibo."'");
$igv2 = 0;
while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_producto"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['cantidad'];
	$nombre_producto=$row['nombre_producto'];
	$igv = $row['igv'];  
	$igv2 = $igv+$igv2;	
	$precio_venta=$row['precio_venta'];
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
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $codigo_producto; ?></td>
            <td class='<?php echo $clase;?>' style="width: 50%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_total_f;?></td>
            
        </tr>

	<?php 

	
	$nums++;
	}
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * TAX )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_recibo=$subtotal+$igv2;
	if($nums === 2)
	{

		echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";
	
		echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";

		echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";

	}
	if($nums === 3)
	{

		echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";
	
		echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";

	}
	if($nums === 4)
	{

		echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";
	
	}
	if($nums === 5)
	{
	 	echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";

	}
	if($nums === 6)
	{
	 	echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";

	}
	if($nums == 7)
	{
		echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";

	}
	if($nums == 8)
	{
		echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";

	}
	if($nums == 9)
	{
		echo "<tr><td colspan='2' height='100' style='widtd: 85%; text-align: left;'><br></td> </tr>";

	}



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
			<td style="widtd :15%; text-align: right;">0.00</td>
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
            <td colspan="3" style="widtd: 85%; text-align: right;">IGV (<?php echo (TAX-1)*100; ?>)% S/ </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($igv2,2);?></td>
		</tr>
		<tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">Importe Total: </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_recibo,2);?></td>
            
        </tr>
        <tr>

        	<td colspan="3" style="widtd: 85%; text-align: left;"> <?php $letra = convertir_a_letras(number_format($total_recibo,2)); echo "SON: ".$letra; ?></td>
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

