<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require('./fpdf/fpdf.php');

class PDF extends FPDF
{
  function Header()
  { 
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0, 10, 'Data Siswa', 0, 1, 'C');

    $this->Line(5, 30, 290, 30);
    $this->Ln(10);
  }

  function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }
}

include "koneksi.php";

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4');

$pdf->SetXY(10, 40);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'NIS', 1, 0, 'C');
$pdf->Cell(70, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(40, 10, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(40, 10, 'Telepon', 1, 0, 'C');
$pdf->Cell(100, 10, 'Alamat', 1, 1, 'C');

$sql = $pdo->prepare("SELECT * FROM siswa");
$sql->execute();

$pdf->SetFont('Arial', '', 12);
while ($data = $sql->fetch()) {
  $pdf->SetX(10);
  $pdf->Cell(30, 10, $data['nis'], 1, 0, 'C');
  $pdf->Cell(70, 10, $data['nama'], 1, 0, 'C');
  $pdf->Cell(40, 10, $data['jenis_kelamin'], 1, 0, 'C');
  $pdf->Cell(40, 10, $data['telp'], 1, 0, 'C');
  $pdf->Cell(100, 10, $data['alamat'], 1, 1, 'L');
}

$pdf->Output();
?>
