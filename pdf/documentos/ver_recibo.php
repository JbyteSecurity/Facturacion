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
	$id_recibo= intval($_GET['id_recibo']);
	$sql_count=mysqli_query($con,"select * from recibos where id_recibo='".$id_recibo."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('recibo no encontrada')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_recibo=mysqli_query($con,"select * from recibos where id_recibo='".$id_recibo."'");
	$rw_recibo=mysqli_fetch_array($sql_recibo);
	$id_recibo=$rw_recibo['id_recibo'];
	$numero_recibo=$rw_recibo['numero_recibo'];
	$id_cliente=$rw_recibo['id_cliente'];
	$id_vendedor=$rw_recibo['id_vendedor'];
	$fecha_recibo=$rw_recibo['fecha_recibo'];
	$condiciones=$rw_recibo['condiciones'];
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/ver_recibo_html.php');
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
        $html2pdf->Output('recibo.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
