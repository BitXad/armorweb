<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Registro Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('registro/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Registro Id</th>
						<th>Persona Id</th>
						<th>Arma Id</th>
						<th>Registro Fechasalida</th>
						<th>Registro Horasalida</th>
						<th>Registro Fechaingreso</th>
						<th>Registro Horaingreso</th>
						<th>Registro Observacion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($registro as $r){ ?>
                    <tr>
						<td><?php echo $r['registro_id']; ?></td>
						<td><?php echo $r['persona_id']; ?></td>
						<td><?php echo $r['arma_id']; ?></td>
						<td><?php echo $r['registro_fechasalida']; ?></td>
						<td><?php echo $r['registro_horasalida']; ?></td>
						<td><?php echo $r['registro_fechaingreso']; ?></td>
						<td><?php echo $r['registro_horaingreso']; ?></td>
						<td><?php echo $r['registro_observacion']; ?></td>
						<td>
                            <a href="<?php echo site_url('registro/edit/'.$r['registro_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('registro/remove/'.$r['registro_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
