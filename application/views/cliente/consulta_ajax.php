<?php foreach($unica as $valor){ ?>

ID Cita<input  type="text" class="form-control" name="id" value="<?php echo $valor['Id_cita']; ?>"></input>
Fecha<input  type="text" class="form-control" name="" value="<?php echo $valor['Fecha_inicial']; ?>" ></input>
Estado<input  type="text" class="form-control" name="" value="<?php echo $valor['Estado']; ?>" ></input>
Notas<input  type="text" class="form-control" name="" value="<?php echo $valor['Notas']; ?>" ></input>


<?php		};?>
