<?php
ob_start();
require_once('../App/TCPDF-main/tcpdf.php');

$id_venta_get = $_GET['id_ventas'];
$nro_venta_get = $_GET['nro_venta'];

include('../App/config.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215,279), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Sistema de Ventas');
$pdf->SetTitle('Factura de ventas');
$pdf->SetSubject('Factura de ventas');
$pdf->SetKeywords('Factura de ventas');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, 5, 5);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------


$pdf->SetFont('Helvetica', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect

// Set some content to print
$html = '

<div> 
<table border="0" style="font-size: 10px">
    <tr>
        <td style="text-align: center; width: 200px">
            <b>SISTEMA DE VENTAS  WEB</b> <br>
            DIRRECION <br>
            xxxxx - xxxxx <br>
            Ciudad - Departamento
        </td>
        <td style="width: 200px"></td>
        <td style="font-size: 16px; width: 290px">
            <b>NIT:</b> xxxxxxxxx <br>
            <b>Nro factura:</b> 0001 <br>
            <b>Nro de autorización:</b> 100020029930
        </td>
    </tr>
</table>

<p style="text-align: center; font-size: 25px"><b>FACTURA # </b></p>

<div>
  <table border="1" style="font-size: 13px; width: 100%">
    <tr>
      <td style="width: 50%">
        <b>Fecha:</b> 14/05/2025<br>
        <b>Hora:</b> 18:00
      </td>
      <td style="width: 50%">
        <b>Señor(es):</b> Cliente x<br>
        <b>NIT/CI:</b> 83773277323<br>
        <b>Teléfono:</b> 76543210
      </td>
    </tr>
  </table>
</div>


<div> 
<table border="1" cellpadding="5" style="font-size: 12px; width: 100%; border-collapse: collapse;">
  <thead>
    <tr style="background-color: #343a40; color: white;">
      <th style="text-align: center; width: 40px;">#</th>
      <th style="text-align: left; ">Producto</th>
      <th style="text-align: left;width: 250px;">Descripción</th>
      <th style="text-align: center; width: 80px;">Cantidad</th>
      <th style="text-align: right; width: 100px;">P/U (Bs)</th>
      <th style="text-align: right; ">Subtotal (Bs)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="text-align: center; width: 40px;">1</td>
      <td>Atún</td>
      <td style="width: 250px;">Atún en lata de 160g</td>
      <td style="text-align: center; width: 80px;">3</td>
      <td style="text-align: right; width: 100px;">15.00</td>
      <td style="text-align: right; ">45.00</td>
    </tr>
    <tr>
      <td style="text-align: center;">2</td>
      <td>Lomito</td>
      <td>Lomito ahumado premium</td>
      <td style="text-align: center;">2</td>
      <td style="text-align: right;">30.00</td>
      <td style="text-align: right;">60.00</td>
    </tr>
    <tr>
      <td style="text-align: center;">3</td>
      <td>Avena</td>
      <td>Avena en hojuelas 1kg</td>
      <td style="text-align: center;">1</td>
      <td style="text-align: right;">20.00</td>
      <td style="text-align: right;">20.00</td>
    </tr>
  </tbody>
  <tfoot>
    <tr style="background-color: #f1f1f1;">
      <td colspan="5" style="text-align: right; font-weight: bold;">TOTAL:</td>
      <td style="text-align: right; font-weight: bold;">125.00 Bs</td>
    </tr>
  </tfoot>
</table>

</div>








';

$pdf->writeHTML($html, true,false, false, true, '',);

$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255, 255, 255),
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

//$QR = 'Factura realizada por el sistema de Ventas, al cliente con nit:  
//y esta factura se generó en el ';

$pdf->write2DBarcode($QR, 'QRCODE,L', 22, 105, 35, 35, $style);

// ---------------------------------------------------------
ob_end_clean();
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+