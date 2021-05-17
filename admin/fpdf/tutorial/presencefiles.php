<?php
require('../fpdf.php');
// require '../../config/database.php';
// $datee=$_GET['datee'];
// $req=$db->prepare('SELECT * FROM presence WHERE id = ?');
// $req->execute(array($datee));

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

// Simple table
function BasicTable()
{
	// Header
	$this->Image('S.png',5,1,190);
	// $this->Cell(w:0, h:10, txt:'ATTESTATION', border:'TB',ln:1,link:'', align:'C');

	// foreach($header as $col)

	// $this->Cell(40,100,$col,100);
	$this->Ln(70);
	
	require 'config/database.php';
	$datee=$_GET['datee'];
	$nom=$_GET['nom'];
	// $req=$db->prepare("SELECT * FROM presence WHERE datePresence ='$datee' OR nom='$nom'");
	$req=$db->prepare("SELECT * FROM presence WHERE datePresence ='$datee' OR nom='$nom'");
	$req1=$db->prepare("SELECT * FROM presence WHERE");

	$req->execute();
	// $req1->execute();

	// $ok=$req->fetch();
	// $ok1=$req1->fetch(PDO::FETCH_OBJ);


	// $req=$db->prepare('SELECT * FROM presence ');
	// $req->execute(array());
	

		$this->Cell(190,12,'Liste de presence ',1,0,'C');
		$this->Ln();
		$this->Cell(65,10,'NOM',1,0,'C');
		// $this->Cell(40,10,'Email',1,0,'C');
		$this->Cell(65,10,'DATE',1,0,'C');
		$this->Cell(60,10,'ETAT',1,0,'C');
		// $this->Cell(40,10,'FIN',1,0,'C');
		// $this->Cell(30,10,'Nbr Jour',1,0,'C');
		$this->Ln();
// if($ok){
	while ($row = $req->fetch(PDO::FETCH_OBJ)) {
		
		// $this->Cell(40,8,$row->FirstName,1,0,'C');
		// $this->Cell(40,8,$row->email,1,0,'C');
		$this->Cell(65,8,$row->nom,1,0,'C');
		$this->Cell(65,8,$row->datePresence,1,0,'C');
		$this->Cell(60,8,$row->etat,1,0,'C');
		// $this->Cell(30,8,$row->nbrJour,1,0,'C');
		$this->Ln();
	}
// }elseif($ok1){
// 	while ($row = $req1->fetch(PDO::FETCH_OBJ)) {
		
// 		// $this->Cell(40,8,$row->FirstName,1,0,'C');
// 		// $this->Cell(40,8,$row->email,1,0,'C');
// 		$this->Cell(65,8,$row->nom,1,0,'C');
// 		$this->Cell(65,8,$row->datePresence,1,0,'C');
// 		$this->Cell(60,8,$row->etat,1,0,'C');
// 		// $this->Cell(30,8,$row->nbrJour,1,0,'C');
// 		$this->Ln();
// 	}
// }else{
// 	echo"errorrrrrrrr";
// }
	
	// Data
	// foreach($data as $row)
	// {
	// 	foreach($row as $col)
			
	// 		$this->Cell(40,6,$col,1);
	// 	$this->Ln();
	// }
}

// Better table
function ImprovedTable($data)
{
	// Column widths
	$w = array(40, 35, 40, 45);
	// Header
	// for($i=0;$i<count($header);$i++)
	// 	$this->Cell($w[$i],7,$header[$i],1,0,'C');
	// $this->Ln();
	// Data
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(40, 35, 40, 45);
	// for($i=0;$i<count($header);$i++)
	// 	$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	// $this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}
// $pdf=new FPDF(orientation:'P', unit:'mm', size:'A5');
$pdf = new PDF();
// Column headings
// $header = array('Nom', 'Date', 'Date fin', '');
// Data loading
// $data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable();
$pdf->AddPage();
// $pdf->ImprovedTable($data);
$pdf->AddPage();
// $pdf->FancyTable($data);
$pdf->Output();

?>
