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
	require_once('HtmlExcel.php');

		
	//Variables por GET
	$fecha_inicial=$_GET['fecha_inicial'];
	$fecha_final=$_GET['fecha_final'];
	$tipo_documento = $_GET['tipo_documento'];	
	

    // get the HTML
     ob_start();
	 include(dirname('__FILE__').'/res/reporte_html.php');
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
        //Excel
        $xls = new HtmlExcel();		
		$xls->addSheet("Reporte", $content);		
		$xls->headers();
		echo $xls->buildFile();
        ///////////////////////////////////
        // send the PDF
		$html2pdf->Output('Reporte'.'.pdf');
		//$html2pdf->Output('Factura.pdf');
		
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
