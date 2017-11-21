
<?php
require_once('assets/pdf/tcpdf/tcpdf.php');

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Miguel Caro');
$pdf->SetTitle('Citas Canceladas');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(20, 20, 20, false);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFont('Helvetica', '', 10);
$pdf->addPage();

$content = '';

$content .= '
  <div class="row">
        <div class="col-md-12">
            <h1 style="text-align:center;">'."Citas Canceladas".'</h1>

    <table border="1" cellpadding="5">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Notas</th>
          <th>Fecha</th>
          <th>Tercero</th>
          <th>Vehiculo</th>

        </tr>
      </thead>
';


foreach ($resultado as $valor) {


$content .= '
  <tr >
          <td>'. $valor['Id_cita'].'</td>
          <td>'. $valor['Notas'].'</td>
          <td>'. $valor['Fecha_inicial'].'</td>
          <td>'. $valor['Terceros_Nit'].'</td>
          <td>'. $valor['Vehiculos_Placa'].'</td>

      </tr>
';
}

$content .= '</table>';



$pdf->writeHTML($content, true, 0, true, 0);

$pdf->lastPage();
$pdf->output('Reporte.pdf', 'I');


 ?>
