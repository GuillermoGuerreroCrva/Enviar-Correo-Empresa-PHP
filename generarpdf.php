<?php

require('fpdf.php');

$host = "187.160.239.37";
$port = "5432";
$dbname = "feria";
$user = "postgres";
$password = "Eisa2022.";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    if (!$conn) {
    die("Error de conexión: " . pg_last_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_final = $_POST['fecha'];
    $nombre_empresa = $_POST['empresa'];

}

$sql = "SELECT unidad AS myunidad from monterrey.tarjetas where unidad='$fecha_final' and recibo='$nombre_empresa'";
$resultado=pg_query($conn, $sql);

$nombreEmpresa = pg_fetch_assoc($resultado);

$nombre_total_final = $nombreEmpresa['myunidad'];



$sql = "SELECT recibo AS myrecibo from monterrey.tarjetas where unidad='$fecha_final' and recibo='$nombre_empresa'";
$resultado=pg_query($conn, $sql);

$fecha2 = pg_fetch_assoc($resultado);

$fecha_total_final = $fecha2['myrecibo'];

//Generar PDF
$pdf = new FPDF();

$pdf->AddPage();

$nombre0 = $nombre_total_final;
$nombre1 = $fecha_total_final;

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Total Empresa: ' . $nombre0, 0, 1);
$pdf->Cell(0, 10, 'Fecha de Aplicacion: ' . $nombre1, 0, 1);

$pdf->Output('archivo.pdf', 'D');

?>

