

  <div class="row">
        <div class="col-md-12">
            <h1 style="text-align:center;">Citas Canceladas"</h1>

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

<?php
foreach ($resultado as $valor) {?>



  <tr >
          <td><?php echo $valor['Id_cita']; ?></td></td>
          <td> <?php echo $valor['Notas']; ?></td>
          <td> <?php echo $valor['Fecha_inicial']; ?></td>
          <td><?php echo $valor['Terceros_Nit']; ?></td>
          <td> <?php echo $valor['Vehiculos_Placa']; ?></td>

      </tr>

<?php }; ?>

</table>
