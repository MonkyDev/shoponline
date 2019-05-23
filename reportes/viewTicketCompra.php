<?php
header("Content-Type: text/text; charset=ISO-8859-1");
date_default_timezone_set('America/Mexico_City'); 

require_once("../clases/fpdf/fpdf.php");
require_once("../clases/consultas_db.php");
require_once("../clases/conexion.php");

$db= new conexion;
$querys = new consultas;
$pk_venta=$_GET['noTick'];
$folioOrden=$_GET['folioOrden'];

$result=$querys->ObtieneLosDatosDelaCompraParaTicket($pk_venta);
$n_reg=$db->getNRows($result);
$row=$db->getRows($result);

//Calculo para el tamano de papel
$tPapel=7.8+.7*$n_reg;

$pdf=new FPDF('P','cm',array(4.5,$tPapel));
//Asignacion de valores a las variables
$fecha=$row['FechCompra'];
$hora=$row['HoraCompra'];
$folio=$row['pk_venta'];
$total=$row['Total'];

$pdf->SetLeftMargin(.1);
$pdf->SetRightMargin(.1);
$pdf->SetTopMargin(.1);
$pdf->AddPage();

//**************** CABECERA DEL TICKET ******************
$pdf->Image("../assets/logoTienda.png",0,0,4.5,1);
$pdf->SetFont('Arial','B',8);
$pdf->SetY(1);
$pdf->Cell(4.3,.5,'FOLIO: '. $folio,0,1,'R');
$pdf->SetY(1.5);
$pdf->Cell(4.3,.5,'TICKET DE PAGO',1,1,'C');
$pdf->SetFont('Arial','B',6);
$pdf->SetY(2.3);
$pdf->Cell(0,0,"Fecha: ".$fecha."     Hr: ".$hora ,0,1,'R');
$pdf->SetFont('Arial','B',4);
$pdf->SetY(2.6);
$pdf->Cell(0,0,"CLIENTE: ".$row['Nombre'],0,1,'L');
$pdf->SetY(2.6);
$pdf->Cell(0,0,"No.".$row['pk_cliente'],0,1,'R');
$pdf->SetFont('Arial','B',8);
$pdf->SetY(2.7);
$pdf->Cell(0,0,"--------------------------------------------",0,1,'L');
$pdf->SetY(2.9);
$pdf->Cell(0,0,"Cant      Descripcion     Importe",0,1,'L');
$pdf->SetY(3.1);
$pdf->Cell(0,0,"--------------------------------------------",0,1,'L');

//**************** CUERPO DEL TICKET ******************
$pdf->SetFont('Arial','',5);
$ren=3.2;
$result=$querys->ObtieneLosDatosDelaCompraParaTicket($pk_venta);
$row=$db->getRows($result);
do{
	$desc=$row['descrip_prod'];
	$longitudDesc=strlen($desc);
	$lineas=(int)($longitudDesc/20)+1;
	$pdf->SetXY(.2,$ren);
    $pdf->Cell(.5,.3,$row['Cantidad'],0,1,'L');
	$pdf->SetXY(.5,$ren);
	$pdf->MultiCell(3.0,.3,$desc);
    $pdf->SetXY(3.5,$ren);
    $pdf->Cell(1,.3, "$" . number_format($row['Importe'],2),0,1,'R');
	if($lineas>0)
		$ren+=.3*$lineas;
	else
		$ren+=.3;
}while($row=$db->getRows($result));
$ren+=.2;
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(3.2,$ren);
$pdf->Cell(1.3,.2,"TOTAL: $" . number_format($total,2),0,1,'R');
$fol=$ren+.6;
$pdf->SetFont('Arial','',5);
$pdf->SetY($fol);
$pdf->Cell(0,0,"Orden de Compra: ",0,1,'L');
$pdf->SetFont('Arial','B',5);
$pdf->SetY($fol);
$pdf->Cell(0,0,$folioOrden,0,1,'R');
//**********PIE DEL TICKET***********************
$pdf->SetFont('Arial','',6);
//$ren+=.3;
$pdf->SetXY(.8,$ren+.9);
$pdf->MultiCell(3,.3,'Gracias por su preferencia! Los Favoritos www.losfavoritos.com.mx ',0,'C');
/*$pdf->SetY($ren+1.2);
$pdf->Cell(4.5,.3,'shopping Online Los Favoritos',0,0,'C');
$pdf->SetY($ren+1.5);
$pdf->Cell(4.5,.3,'www.losfavoritos.com.mx',0,0,'C');
$pdf->SetY($ren+1.8);
$pdf->Cell(4.5,.3,'Telefono: 961 00-00000 ',0,0,'C');
$pdf->SetY($ren+2.1);
$pdf->Cell(4.5,.3,'Tuxtla Gutierrez, Chiapas',0,0,'C');
*/
$pdf->Output();

?>
