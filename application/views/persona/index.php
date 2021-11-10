<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Persona Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('persona/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Persona Id</th>
						<th>Grado Id</th>
						<th>Estado Id</th>
						<th>Tipo Id</th>
						<th>Persona Nombre</th>
						<th>Persona Apellido</th>
						<th>Persona Ci</th>
						<th>Persona Telefono</th>
						<th>Persona Celular</th>
						<th>Persona Direccion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($persona as $p){ ?>
                    <tr>
						<td><?php echo $p['persona_id']; ?></td>
						<td><?php echo $p['grado_id']; ?></td>
						<td><?php echo $p['estado_id']; ?></td>
						<td><?php echo $p['tipo_id']; ?></td>
						<td><?php echo $p['persona_nombre']; ?></td>
						<td><?php echo $p['persona_apellido']; ?></td>
						<td><?php echo $p['persona_ci']; ?></td>
						<td><?php echo $p['persona_telefono']; ?></td>
						<td><?php echo $p['persona_celular']; ?></td>
						<td><?php echo $p['persona_direccion']; ?></td>
						<td>
                            <a href="<?php echo site_url('persona/edit/'.$p['persona_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('persona/remove/'.$p['persona_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
