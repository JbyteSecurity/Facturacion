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
	
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	$numero_factura=$_GET['numero_factura'];
	$tipo_nota = $_GET['tipo_nota'];
	$motivo=mysqli_real_escape_string($con,(strip_tags($_REQUEST['motivo'], ENT_QUOTES)));

	
	

	//Fin de variables por GET
	$sql=mysqli_query($con, "select numero as last from correlativos where documento = 'Nota' ");
	$rw=mysqli_fetch_array($sql);
	$numero_nota=$rw['last'];	

    // get the HTML
     ob_start();
	 include(dirname('__FILE__').'/res/nota_html.php');
	//echo dirname('__FILE__');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
		$html2pdf->Output('Nota.pdf');
		//$html2pdf->Output('Factura.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
