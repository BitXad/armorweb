<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tipo Persona Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_persona/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Tipo Id</th>
						<th>Tipo Descripcion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tipo_persona as $t){ ?>
                    <tr>
						<td><?php echo $t['tipo_id']; ?></td>
						<td><?php echo $t['tipo_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('tipo_persona/edit/'.$t['tipo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tipo_persona/remove/'.$t['tipo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
