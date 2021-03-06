<?php
	/*-------------------------
	Autor: Jordan Diaz
	Web: 
	Mail: jordandiaz2016@gmail.com
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	$id_nota= intval($_GET['id_nota']);
	$sql_count=mysqli_query($con,"select * from nota where id_nota='".$id_nota."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('Nota no encontrada')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_nota=mysqli_query($con,"select * from nota where id_nota='".$id_nota."'");
	$rw_nota=mysqli_fetch_array($sql_nota);
	$numero_nota = $rw_nota['numero_nota'];
	$numero_factura=$rw_nota['numero_factura'];
	$id_nota=$rw_nota['id_nota'];
	$id_vendedor=$rw_nota['id_vendedor'];
	$fecha_nota=$rw_nota['fecha_nota'];
	$motivo=$rw_nota['motivo'];
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/ver_nota_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		//echo "GET VALUE".$_GET['vuehtml'];
        // send the PDF
        $html2pdf->Output('Nota.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
