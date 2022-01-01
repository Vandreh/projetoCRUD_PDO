<?php
	use Dompdf\Dompdf;
	include_once "dompdf/autoload.inc.php";
	$pdf = new Dompdf();

	$html = file_get_contents("http://localhost/projetoFinal/produto.php");
	$pdf -> loadHtml($html);
	$pdf -> setPaper("A4", "landingpage");
	$pdf -> render();
	$pdf -> stream();
?>